<?php

namespace Sopinet\ChatBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class MessagePackageAdmin extends AbstractAdmin
{
    /**
     * Default Datagrid values
     *
     * @var array
     */
    protected $datagridValues = array(
        '_sort_by' => 'createdAt',
        '_sort_order' => 'DESC', // Descendant ordering (default = 'ASC')
    );

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('id')
            ->add('message')
            ->add('message.fromUser')
            ->add('message.fromDevice')
            ->add('toUser')
            ->add('toDevice')
            ->add('status')
            ->add('processed')
            ->add('createdAt')
            ->add('toDevice.deviceType', 'doctrine_orm_choice', [], 'choice', array('choices' => array(
                'iOS' => 'iOS',
                'Android' => 'Android'
            )));
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('id')
            ->add('message')
            ->add('toUser')
            ->add('toDevice')
            ->add('status')
            ->add('processed')
            ->add('createdAt')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ));
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper
            //->add('id')
            ->add('message')
            ->add('toUser')
            ->add('toDevice')
            ->add('status')
            ->add('processed');
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
            ->add('message')
            ->add('toUser')
            ->add('toDevice')
            ->add('status')
            ->add('processed')
            ->add('createdAt')
            ->add('updatedAt');
    }
}
