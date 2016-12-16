<?php

namespace Frisky\AddressBookBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PersonType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
                ->add('lastname')
                ->add('description')
//                ->add('address', EntityType::class, array('class'=> 'ABBundle:Address', 'choice_label'=>'street'))
//                ->add('groups', EntityType::class, array('class'=> 'ABBundle:GroupOfUsers', 'choice_label' => 'groupname', 'multiple'=>true))        
                ->add('address', 'entity', array('class' => 'ABBundle:Address', 'choice_label' => 'street'))
                ->add('groups', 'entity', array('class' => 'ABBundle:GroupOfUsers', 'choice_label' => 'groupname', 'multiple'=>true));
                ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frisky\AddressBookBundle\Entity\Person'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'frisky_addressbookbundle_person';
    }


}
