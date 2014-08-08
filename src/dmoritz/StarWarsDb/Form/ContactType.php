<?php
/**
 * Created by PhpStorm.
 * User: dmoritz
 * Date: 08.08.14
 * Time: 11:00
 */

namespace dmoritz\StarWarsDb\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('name');
        $builder->add('email','email',array('label' => 'E-Mail'));
        $builder->add('subject', null, array('max_length' => 100));
        $builder->add('message', 'textarea');
    }

    public function getName()
    {
        return 'contact';
    }
}