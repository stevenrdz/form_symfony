<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

# Importación de librerias - Form
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
#use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('category', EntityType::class,[
                'class' => Category::class,
                'label' => 'Categorias',
                'placeholder' => 'Seleccione una categoria'
            ])
            ->add('title', TextType::class,[
                'label' => 'Titulo de la Publicación',
                'help' => 'Piensa en el SEO ¿Cómo buscaria en google?'
            ])
            ->add('body', TextareaType::class,[
                'label' => 'Contenido',
                'attr' => ['rows' => 9, 'class' => 'bg-light'] 
            ])
            ->add('Enviar', SubmitType::class,[
                'attr' => ['class' => 'btn-dark'] 
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
            #'csrf_protection' => false
        ]);
    }
}
