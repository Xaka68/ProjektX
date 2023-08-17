<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\StudentType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('student')]
class StudentController extends AbstractController
{
    #[Route('/edit/{id?0}', name: 'student.edit')]
    public function addStudent(Student $student = null, ManagerRegistry $doctrine, Request $request, $id): Response
    {
        $new = false;
      if (!$student) {
          //creation of the entity who is the image of the form
          $student = new Student();
          $new = true;
      }

      $form = $this->createForm(StudentType::class, $student);
        // handle the request
        $form->handleRequest($request);

      if ($form->isSubmitted()) {

          $entityManager = $doctrine->getManager();
          $entityManager->persist($student);
          $entityManager->flush();
          if ($new) {
              $message = " has been added";
          } else {
              $message = " has been updated";
          }
          $this->addFlash('success', $student->getFirstName().$message);
         return  $this->redirectToRoute('/');

      } else {

          return $this->render('student/add-student.html.twig', [
              'form' => $form->createView(),
          ]);
      }

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
    #[Route('/all', name: 'student.all')]
    public function getAllStudent(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Student::class);
        $students = $repository->findAll();

        return $this->render('student/index.html.twig', [
            'students' => $students,
        ]);
    }

}
