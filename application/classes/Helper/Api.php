<?php defined('SYSPATH') or die('No direct script access.');
/**
 * API authentication utility class.
 */
class Helper_Api {
    const SECRET_KEY = 'Hg0tnvOzx9Xza85i3Nskmtf3qoDSiA7N';

    /**
     * @const   string      Algorithm used to sign requests
     */
    const HASH_HMAC_ALGO = 'sha256';

    /**
     * @const   integer     Timestamp window to prevent replay attacks (4 mins)
     */
    const TIMESTAMP_WINDOW = 240;

    /**
     * Authenticates a request to make sure it is coming from
     * a trusted source.
     *
     * @param   Request $request
     * @return  void
     * @throws  Exception
     * @throws  Database_Exception
     */
    public static function validateRequest(Request $request)
    {
        // Check required headers
        $headers['x-signature'] = $request->headers('x-signature', NULL);
        $headers['x-timestamp'] = $request->headers('x-timestamp', NULL);
        $headers['x-api-key'] = $request->headers('x-api-key', NULL);

        if ( ! isset($headers['x-signature'], $headers['x-timestamp'], $headers['x-api-key']))
            throw new Exception('missing headers', 400);

        // Validate timestamp
        if ((time() - $headers['x-timestamp']) > self::TIMESTAMP_WINDOW)
            throw new Exception('invalid timestamp', 400);

        try {
            // Validate api key
            if ( ! Model_ApiUser::validateKey($headers['x-api-key']))
                throw new Exception('invalid api key', 400);
        }
        catch(Database_Exception $e) {
            Log::instance()->add(Log::ERROR, $e->getMessage());
            throw new Exception('database error', 500);
        }

        if ( $headers['x-signature'] != self::makeRequestSignature($request) )
            throw new Exception('invalid signature', 400);
    }

    /**
     * Generates the fingerprint for a request with the given arguments.
     *
     * @param   Request     $request    Request object
     * @return  string
     */
    public static function makeRequestSignature(Request $request)
    {
        return self::makeSignature($request->method(), '/' . $request->uri(), $request->headers('x-api-key'), $request->headers('x-timestamp'));
    }

    /**
     * Generates the fingerprint for a request with the given arguments.
     *
     * @param   string  $method             HTTP request method
     * @param   string  $uri                Request URI starting but not ending in /
     * @param   string  $api_key            Secret key used to hash
     * @param   string  $timestamp           
     * @return  string
     */
    public static function makeSignature($method, $uri, $api_key, $timestamp)
    {
        $data = array(
            $method,
            $uri,
            $api_key,
            $timestamp
        );

        $data = implode(':', $data);

        $signature = base64_encode(hash_hmac(self::HASH_HMAC_ALGO, $data, self::SECRET_KEY, true));

        return $signature;
    }
} 