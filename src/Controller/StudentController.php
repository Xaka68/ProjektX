<?php

namespace App\Controller;

use App\Entity\Course;
use App\Entity\Student;
use App\Form\StudentType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    #[Route('student/add', name: 'student.add')]
    public function addStudent(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        //creation of the entity who is the image of the form
      $student = new Student();
      $form = $this->createForm(StudentType::class, $student);

        return $this->render('student/add-student.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    #[Route('/update', name: 'student.update')]
    public function updateStudent(): Response
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }
    #[Route('/delete/{id}', name: 'student.delete')]
    public function deleteStudent(): Response
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }
    #[Route('/get/{id}', name: 'student.get')]
    public function getStudent(): Response
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }
    #[Route('/getAll', name: 'student.all')]
    public function getAllStudent(): Response
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }

}
