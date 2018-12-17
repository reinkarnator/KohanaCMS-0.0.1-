<?php defined('SYSPATH') or die('No direct script access.');

public function before()
{
    parent::before();
 
    $this->template->page = URL::site(rawurldecode(Request::initial()->uri()));
 
    if ( ! Request::current()->is_initial())
    {
        if ($message = rawurldecode($this->request->param('message')))
        {
            $this->template->message = $message;
        }
    }
    else
    {
        $this->request->action(404);
    }
 
    $this->response->status((int) $this->request->action());
}

public function action_404()
{
    $this->template->title = '404 Not Found';

    if (isset ($_SERVER['HTTP_REFERER']) AND strstr($_SERVER['HTTP_REFERER'], $_SERVER['SERVER_NAME']) !== FALSE)
    {
        $this->template->local = TRUE;
    }
 
    $this->response->status(404);
}
 
public function action_503()
{
    $this->template->title = 'Maintenance Mode';
}
 
public function action_500()
{
    $this->template->title = 'Internal Server Error';
}