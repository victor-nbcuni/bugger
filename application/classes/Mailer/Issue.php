<?php defined('SYSPATH') or die('No direct script access.');

class Mailer_Issue extends Mailer {
    const FROM_EMAIL = 'victor_nbcuni@yahoo.com';

    private $_issue = NULL;

    public static function factory(Model_Issue $issue)
    {
        return new Mailer_Issue($issue);
    }

    public function __construct(Model_Issue $issue) {
        parent::__construct();

        $this->_issue = $issue;

        $this->FromName = $issue->reporter->name;
        
        //$this->_mail->addAddress('jonathan.vasquez@nbcuni.com');
        $this->addAddress(self::FROM_EMAIL); //$issue->assigned_department->group_email);
        $this->addCC($issue->reporter->email);

        $this->Subject = sprintf("[%s] (%s) %s", strtoupper(APP_NAME), $issue->trackingCode(), $issue->summary);
    }

    public function notifyCreated()
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
            $this->_issue->trackingCode(),
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

    public function notifyStatusUpdated()
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

    public function notifyCommentAdded(Model_Issue_Comment $comment)
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