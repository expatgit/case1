<?php


namespace App\Controller\Admin;


use App\Entity\Task;
use App\Form\TaskType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminTaskController extends AdminBaseController
{
    /**
     * @Route("/admin/task", name="admin_task")
     */
    public function index()
    {
        $task = $this->getDoctrine()->getRepository(Task::class)->findAll();

        $forRender = parent::renderDefault();
        $forRender ['title'] = 'Задачи';
        $forRender ['task'] = $task;
        return $this->render('admin/task/index.html.twig', $forRender);
    }

    /**
     * @Route("/admin/task/add", name="admin_task_add")
     */
    public function addTask(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);
        if ($form->is_submited() && $form->isValid()){
            $task->setCreatedTimeValue();
            $task->setUpdateTimeValue();
            $em->persist($task);
            $em->flush();
            $this->addFlash('success', 'Задача добавлена');
            return $this->redirectToRoute('admin_home');

        }
        $forRender = parent::renderDefault();
        $forRender['title'] = 'Добавление задачи';
        $forRender['form'] = $form->createView();
        return $this->render('admin/task/form.html.twig', $forRender);
    }

}