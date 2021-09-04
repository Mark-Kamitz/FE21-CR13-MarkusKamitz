<?php

namespace App\Controller;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Events;

class EventController extends AbstractController
{
    /**
     * @Route("/", name="event")
     */
    public function index(): Response
    {
        $events = $this->getDoctrine()->getRepository(Events::class)->findAll(); 
        // dd($events);
        return $this->render('event/index.html.twig', [
            'events' => $events
        ]);
    }

    /**
     * @Route("/index/{filter}", name="filter")
     */
    public function filter($filter): Response
    {
        $events = $this->getDoctrine()->getRepository(Events::class)->findBy(['type' => $filter]);
        // dd($events); just for testing :)
        return $this->render('event/index.html.twig', [
            'events' => $events
        ]);
    }

    /**
     * @Route("/create", name="create")
     */
    public function create(Request $request): Response
    {
        $event = new Events;
        $form = $this->createFormBuilder($event)
        ->add("name", TextType::class, array('attr'=>array("class"=>"form-control fw-light border-1 border-muted rounded-pill bg-light shadow-sm mt-3 text-muted", "style"=>"margin-bottom:15px")))
        ->add("date", DateTimeType::class, array('attr'=>array("class"=>"form-control fw-light border-1 border-muted rounded bg-light shadow-sm mt-3 text-muted p-3", "style"=>"margin-bottom:15px")))
        ->add("description", TextareaType::class, array('attr'=>array("class"=>"form-control fw-light border-1 border-muted rounded bg-light shadow-sm mt-3 text-muted", "style"=>"margin-bottom:15px")))
        ->add("image", TextType::class, array('attr'=>array("class"=>"form-control fw-light border-1 border-muted rounded-pill bg-light shadow-sm mt-3 text-muted", "style"=>"margin-bottom:15px")))
        ->add("capacity", TextType::class, array('attr'=>array("class"=>"form-control fw-light border-1 border-muted rounded-pill bg-light shadow-sm mt-3 text-muted", "style"=>"margin-bottom:15px")))
        ->add("email", TextType::class, array('attr'=>array("class"=>"form-control fw-light border-1 border-muted rounded-pill bg-light shadow-sm mt-3 text-muted", "style"=>"margin-bottom:15px")))
        ->add("phone", TextType::class, array('attr'=>array("class"=>"form-control fw-light border-1 border-muted rounded-pill bg-light shadow-sm mt-3 text-muted", "style"=>"margin-bottom:15px")))
        ->add("address", TextType::class, array('attr'=>array("class"=>"form-control fw-light border-1 border-muted rounded-pill bg-light shadow-sm mt-3 text-muted", "style"=>"margin-bottom:15px")))
        ->add("url", TextType::class, array('attr'=>array("class"=>"form-control fw-light border-1 border-muted rounded-pill bg-light shadow-sm mt-3 text-muted", "style"=>"margin-bottom:15px")))
        ->add("type", ChoiceType::class, array('attr'=>array("class"=>"form-control fw-light border-1 border-muted rounded-pill bg-light shadow-sm mt-3 text-muted", "style"=>"margin-bottom:15px"), "choices"=> array('Space'=>'Space', 'Music'=>'Music', 'Sport'=>'Sport', 'Theater'=>'Theater', 'Dance'=>'Dance')))
        ->add("save", SubmitType::class, array('attr'=>array("class"=>"btn-outline-primary fw-light btn-sm border-1 shadow-sm rounded-pill m-3", "style"=>"margin-bottom:15px"),"label"=>"create Event"))->getForm();
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $name = $form["name"]->getData();
            $date = $form["date"]->getData();
            $description = $form["description"]->getData();
            $image =$form["image"]->getData();
            $capacity =$form["capacity"]->getData();
            $email = $form["email"]->getData();
            $phone = $form["phone"]->getData();
            $address = $form["address"]->getData();
            $url =$form["url"]->getData();
            $type =$form["type"]->getData();

            // $now = new \DateTime('now');

            $event->setName($name);
            $event->setDate($date);
            $event->setDescription($description);
            $event->setImage($image);
            $event->setCapacity($capacity);
            $event->setEmail($email);
            $event->setPhone($phone);
            $event->setAddress($address);
            $event->setUrl($url);
            $event->setType($type);

            $em = $this->getDoctrine()->getManager();

            $em->persist($event);
            $em->flush();

            $this->addFlash('notice', 'Event Added');

            return $this->redirectToRoute('event');
        }

        return $this->render('event/create.html.twig', [  
            "form" => $form->createView()
         ]);
    }


    /**
     * @Route("/details/{id}", name="details")
     * 
     */
    public function details($id): Response
    {
        $event = $this->getDoctrine()->getRepository('App:Events')->find($id);
        return $this->render('event/details.html.twig', [
            "event" => $event
        ]);
    }

    

    /**
     * @Route("/delete/{id}", name="delete")
     * 
     */
    public function delete($id): Response
    {   $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('App:Events')->find($id);
        $em->remove($event);
        $em->flush();

        $this->addFlash('notice', 'Event Removed');

        return $this->redirectToRoute('event');
    }

    
    /**
     * @Route("/edit/{id}", name="edit")
     */
    public function edit($id, Request $request): Response
    {
        $event = $this->getDoctrine()->getRepository(Events::class)->find($id);
        $form = $this->createFormBuilder($event)
        ->add("name", TextType::class, array('attr'=>array("class"=>"form-control fw-light border-1 border-muted rounded-pill bg-light shadow-sm mt-3 text-muted", "style"=>"margin-bottom:15px")))
        ->add("date", DateTimeType::class, array('attr'=>array("class"=>"form-control fw-light border-1 border-muted rounded bg-light shadow-sm mt-3 text-muted p-3", "style"=>"margin-bottom:15px")))
        ->add("description", TextareaType::class, array('attr'=>array("class"=>"form-control fw-light border-1 border-muted rounded bg-light shadow-sm mt-3 text-muted", "style"=>"margin-bottom:15px")))
        ->add("image", TextType::class, array('attr'=>array("class"=>"form-control fw-light border-1 border-muted rounded-pill bg-light shadow-sm mt-3 text-muted", "style"=>"margin-bottom:15px")))
        ->add("capacity", TextType::class, array('attr'=>array("class"=>"form-control fw-light border-1 border-muted rounded-pill bg-light shadow-sm mt-3 text-muted", "style"=>"margin-bottom:15px")))
        ->add("email", TextType::class, array('attr'=>array("class"=>"form-control fw-light border-1 border-muted rounded-pill bg-light shadow-sm mt-3 text-muted", "style"=>"margin-bottom:15px")))
        ->add("phone", TextType::class, array('attr'=>array("class"=>"form-control fw-light border-1 border-muted rounded-pill bg-light shadow-sm mt-3 text-muted", "style"=>"margin-bottom:15px")))
        ->add("address", TextType::class, array('attr'=>array("class"=>"form-control fw-light border-1 border-muted rounded-pill bg-light shadow-sm mt-3 text-muted", "style"=>"margin-bottom:15px")))
        ->add("url", TextType::class, array('attr'=>array("class"=>"form-control fw-light border-1 border-muted rounded-pill bg-light shadow-sm mt-3 text-muted", "style"=>"margin-bottom:15px")))
        ->add("type", ChoiceType::class, array('attr'=>array("class"=>"form-control fw-light border-1 border-muted rounded-pill bg-light shadow-sm mt-3 text-muted", "style"=>"margin-bottom:15px"), "choices"=> array('Space'=>'Space', 'Music'=>'Music', 'Sport'=>'Sport', 'Theater'=>'Theater', 'Dance'=>'Dance')))
        ->add("save", SubmitType::class, array('attr'=>array("class"=>"btn-outline-primary fw-light btn-sm border-1 shadow-sm rounded-pill m-3", "style"=>"margin-bottom:15px"),"label"=>"save Event"))->getForm();
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $name = $form["name"]->getData();
            $date = $form["date"]->getData();
            $description = $form["description"]->getData();
            $image =$form["image"]->getData();
            $capacity =$form["capacity"]->getData();
            $email = $form["email"]->getData();
            $phone = $form["phone"]->getData();
            $address = $form["address"]->getData();
            $url =$form["url"]->getData();
            $type =$form["type"]->getData();

            $event->setName($name);
            $event->setDate($date);
            $event->setDescription($description);
            $event->setImage($image);
            $event->setCapacity($capacity);
            $event->setEmail($email);
            $event->setPhone($phone);
            $event->setAddress($address);
            $event->setUrl($url);
            $event->setType($type);

            $em = $this->getDoctrine()->getManager();

            $em->persist($event);
            $em->flush();

            $this->addFlash('notice', 'Event Edited');

            return $this->redirectToRoute('event');
        }

        return $this->render('event/edit.html.twig', [  
            "form" => $form->createView()
         ]);

         
    }
}
