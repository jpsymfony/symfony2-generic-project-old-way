<?php
namespace App\CoreBundle\Traits\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

trait TraitDatetime
{
    /**
     * @var \DateTime $created_at
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="create")
     */
    protected $created_at;
    
    /**
     * @var \DateTime $updated_at
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="update")
     */
    protected $updated_at;
    
    /**
     * @var \DateTime $published_at
     *
     * @ORM\Column(name="published_at", type="datetime", nullable=true)
     */
    protected $published_at;
    
    /**
     * @var \DateTime $archive_at
     *
     * @ORM\Column(name="archive_at", type="datetime", nullable=true)
     */
    protected $archive_at;

    /**
     * {@inheritdoc}
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
        return $this;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
        return $this;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setPublishedAt($publishedAt)
    {
        $this->published_at = $publishedAt;
        return $this;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getPublishedAt()
    {
        return $this->published_at;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setArchiveAt($archiveAt)
    {
        $this->archive_at = $archiveAt;
        return $this;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getArchiveAt()
    {
        return $this->archive_at;
    }
}
