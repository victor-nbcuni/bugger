<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Utility class for issue related emails.
 */
class Mailer_Issue extends Mailer {
    /**
     * The issue in question.
     *
     * @var Model_Issue
     */
    private $_issue = NULL;

    public static function factory(Model_Issue $issue)
    {
        return new Mailer_Issue($issue);
    }

    public function __construct(Model_Issue $issue) {
        parent::__construct();

        $this->_issue = $issue;

        $this->FromName = $issue->reporter->name;

        $this->addAddress($issue->assigned_department->group_email);
        $this->addCC($issue->reporter->email);

        $this->Subject = sprintf("[%s] (%s) %s", strtoupper(APP_NAME), $issue->trackingId(), $issue->summary);
    }

    public function sendCreated()
    {
        $body = sprintf('
            %s <b>created</b> ticket %s

            <h2><a href="%s">%s</a></h2>

            Type: %s <br>

            Assignee: %s <br>

            Created: %s <br>

            Priority: %s <br>

            Reporter: %s
            ',
            $this->_issue->reporter->name,
            $this->_issue->trackingId(),
            $this->_issue->url(TRUE),
            $this->_issue->summary,
            $this->_issue->type->name,
            $this->_issue->assigned_department->name,
            $this->_issue->created_at,
            $this->_issue->priority,
            $this->_issue->reporter->name
        );

        return $this->send($body);
    }

    public function sendStatusUpdated()
    {
        $body = sprintf('
            %s <b>changed</b> status to <b>"%s"</b>

            <h2><a href="%s">%s</a></h2>

            Updated: %s <br>
            ',
            $this->_issue->last_updated_by->name,
            $this->_issue->status->name,
            $this->_issue->url(TRUE),
            $this->_issue->summary,
            $this->_issue->updated_at
        );

        return $this->send($body);
    }

    public function sendCommentAdded(Model_Issue_Comment $comment)
    {
        $body = sprintf('
            %s <b>commented:</b> "%s"</b>

            <h2><a href="%s">%s</a></h2>

            Updated: %s <br>
            ',
            $comment->user->name,
            $comment->comment,
            $this->_issue->url(TRUE),
            $this->_issue->summary,
            $this->_issue->updated_at
        );

        return $this->send($body);
    }
}
