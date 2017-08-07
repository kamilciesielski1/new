<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProgrammerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('nickname', 'text')
                ->add('avatarNumber', 'choice', [
                    'choices' => [
                        1 => 'Girl',
                        2 => 'Boy',
                        3 => 'Cat',
                        4 => 'Boy with hat',
                        5 => 'Happy robot',
                        6 => 'Girl purple'
                    ]
                ])
                ->add('tagLine', 'textarea');
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Programmer'
        ]);
    }

    public function getName() 
    {
        return 'Programmer';
    }
}
