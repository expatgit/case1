<?php

namespace App\Form;

use App\Entity\Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
                'label' => 'Наименование задачи',
                'attr' => [
                    'placeholder' => 'Введите название задачи'
                ]

            ))
            ->add('text', TextareaType::class, array(
                'label' => 'Описание задачи',
                'attr' => [
                    'placeholder' => 'Введите описание задачи'
                ]
            ))
            ->add('created_time', \DateTime::class, array(
                'label' => 'Дата добавления',
                'attr' => [
                    'placeholder' => 'Дата создания задачи'
                ]
            ))
            ->add('update_time', \DateTime::class, array(
                'label' => 'Срок выполнения',
                'attr' => [
                    'placeholder' => 'Введите срок выполнения задачи'
                ]
            ))
            ->add('user', TextType::class, array(
                'label' => 'Исполнитель',
                'attr' => [
                    'placeholder' => 'Введите имя исполнителя'
                ]
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'Сохранить',
                'attr' => 'btn btn-success'
            ));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}
