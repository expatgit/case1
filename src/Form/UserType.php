<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\RedirectController;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, array(
                'label' => 'Введите email  ',
                'attr' => [
                    'placeholder' => 'Введите email'
                ]
            ))
            ->add('plainPassword', RepeatedType::class, array(
                    'type' => PasswordType::class,
                        'first_options' => array(
                            'label' => 'Пароль  ',
                            'attr' => [
                                'placeholder' => 'Введите пароль'
                            ]
                        ),
                        'second_options' => array(
                            'label' => 'Повтор пароля  ',
                            'attr' => [
                                'placeholder' => 'Повторите пароль'
                                ]
                        ),
                    ))
                        ->add('save', SubmitType::class, array(
               'label' => "Сохранить",
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
