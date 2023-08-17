<?php

namespace App\Controller;

use App\Entity\Student;
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

        $student = new Student();
        $student->setFirstName('Xavier');
        $student->setLastName('Kamsu');
        $student->setSemester(2);
        $entityManager->persist($student);
        $entityManager->flush();


        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
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
