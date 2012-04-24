<?php

namespace DLauritz\Jeopardy\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class MainController extends Controller
{
    
    public function homeAction()
    {
    	$user = $this->get('security.context')->getToken()->getUser();
    	if ($user === "anon.") {
    		// not logged in
    		$sessions = array();
    		$games = array();
    	} else {
    		$sessions = $user->getSessions();
    		$games = $user->getGames();
    	}
        return $this->render('DLauritzJeopardyMainBundle:Main:home.html.twig',
        		array('sessions' => $sessions, 'games' => $games));
    }
    
    public function aboutAction() {
    	return $this->render('DLauritzJeopardyMainBundle:Main:about.html.twig');
    }
}
