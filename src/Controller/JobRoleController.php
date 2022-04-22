<?php

namespace App\Controller;

use App\Entity\JobRole;
use App\Form\JobRoleType;
use App\Repository\JobRoleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/job/role')]
class JobRoleController extends AbstractController
{
    #[Route('/', name: 'app_job_role_index', methods: ['GET'])]
    public function index(JobRoleRepository $jobRoleRepository): Response
    {
        return $this->render('job_role/index.html.twig', [
            'job_roles' => $jobRoleRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_job_role_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $jobRole = new JobRole();
        $form = $this->createForm(JobRoleType::class, $jobRole);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($jobRole);
            $entityManager->flush();

            return $this->redirectToRoute('app_job_role_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('job_role/new.html.twig', [
            'job_role' => $jobRole,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_job_role_show', methods: ['GET'])]
    public function show(JobRole $jobRole): Response
    {
        return $this->render('job_role/show.html.twig', [
            'job_role' => $jobRole,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_job_role_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, JobRole $jobRole, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(JobRoleType::class, $jobRole);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_job_role_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('job_role/edit.html.twig', [
            'job_role' => $jobRole,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_job_role_delete', methods: ['POST'])]
    public function delete(Request $request, JobRole $jobRole, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$jobRole->getId(), $request->request->get('_token'))) {
            $entityManager->remove($jobRole);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_job_role_index', [], Response::HTTP_SEE_OTHER);
    }
}
