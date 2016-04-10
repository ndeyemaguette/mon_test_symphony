<?php

namespace CarnetAdresseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Doctrine\ORM\EntityRepository;

class CarnetAdresseType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('contact',          'entity', array( 
                'required'          => false, 
                'empty_value'       => 'Choisissez un contact',
                'class'             => 'UserBundle:User',
                'query_builder'     => function(EntityRepository $repository){ 
                    return $repository->createQueryBuilder('c')
                                      ->orderBy('c.nom', 'ASC');
                },
                'property'          => 'nom',
                'label'             => 'Contact'
            ))
            ->add('libelle', 'text', array(
                'required' => false
            ))
            ->add('dateContact', 'text', array(
                'required' => false
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CarnetAdresseBundle\Entity\CarnetAdresse'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'carnetadressebundle_carnetadresse';
    }
}
