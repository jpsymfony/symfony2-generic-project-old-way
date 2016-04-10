<?php
namespace App\PortalBundle\Entity\Manager;

use App\CoreBundle\Entity\Manager\AbstractGenericManager;
use App\PortalBundle\Entity\Manager\Interfaces\ActorManagerInterface;
use App\PortalBundle\Entity\Manager\Interfaces\ManagerInterface;
use App\PortalBundle\Repository\ActorRepository;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Routing\RouterInterface;

class ActorManager extends AbstractGenericManager implements ActorManagerInterface, ManagerInterface
{
    /**
     * @var FormTypeInterface
     */
    protected $searchFormType;

    /**
     * @var FormFactoryInterface
     */
    protected $formFactory;

    /**
     * @var RouterInterface $router
     */
    protected $router;

    /**
     * @inheritdoc
     */
    public function __construct(ActorRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @inheritdoc
     */
    public function getFilteredActors($limit = 20, $offset = 0)
    {
        return $this->repository->getActors($limit, $offset);
    }

    /**
     * @inheritdoc
     */
    public function getActorSearchForm()
    {
        return $this->formFactory->create(
            $this->searchFormType,
            null,
            [
                'action' => $this->router->generate('actor_search'),
                'method' => 'POST',
                'attr' => ['id' => 'form_recherche']
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function setSearchFormType(FormTypeInterface $searchFormType)
    {
        $this->searchFormType = $searchFormType;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function setFormFactory($formFactory)
    {
        $this->formFactory = $formFactory;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function setRouter($router)
    {
        $this->router = $router;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getLabel()
    {
        return 'actorManager';
    }
}
