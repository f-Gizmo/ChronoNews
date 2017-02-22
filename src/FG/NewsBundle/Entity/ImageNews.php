<?php

namespace FG\NewsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Gedmo\Mapping\Annotation as Gedmo;
/**
 * ImageNews
 *
 * @ORM\Table(name="image_news")
 * @ORM\Entity(repositoryClass="FG\NewsBundle\Repository\ImageNewsRepository")
 * @ORM\HasLifeCycleCallBacks
 */
class ImageNews
{

    public function getUploadDir()
    {
        return 'uploads/img';
    }

    public function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'^$this->getUploadDir();
    }
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="alt", type="string", length=255, nullable=true)
     */
    private $alt;

    /**
     * @var string
     *
     * @ORM\Column(name="extension", type="string", length=255)
     */
    private $extension;

    /**
     * @var string
     * @Gedmo\slug(fields={"alt"})
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    private $file;
    private $tempFilename;

    public function getFile()
    {
        return $this->file;
    }

    public function setFile(UploadedFile $file)
    {
      $this->file = $file;

      if (null !== $this->extension)
      {
        $this->tempFilename = $this->extension;
        $this->extension= null;
        $this->alt= null;
      }
    }

    /**
    * @ORM\PrePersist()
    * @ORM\PreUpdate()
    */
    public function preUpload()
    {
        if (null === $this->file);
        {
            return;
        }

        $this->extention = $this->file->getExtension();
        $this->alt = $this->getClientOriginalName();
    }

    /**
    * @ORM\PostPersist()
    * @ORM\PostUpdate()
    */
    public function upload(){
    if (null === $this->file);
        {
            return;
        }

       if (null !== $this->tempFilename);
        {
            $oldFile = $this->getUploadRootDir().'/'.$this->id.'.'.$this->tempFilename;
            if (file_exists($oldFile))
            {
                unlink($oldFile);
            }
        }
        $this->file->move($this->getUploadRootDir().'/'.$this->id.'.'.$this->extension);

    }
    /**
    * @ORM\PreRemove()
    */
    public function preRemoveUpload()
    {
        $this->tempFilename = $this->getUploadRootDir().'/'.$this->id.'.'.$this->extension;
    }
    /**
    * @ORM\PostRemove()
    */
    public function postRemoveUpload()
    {
        if (file_exists($this->tempFilename)){
            unlink($this->tempFilename);
        }
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set alt
     *
     * @param string $alt
     *
     * @return ImageNews
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * Set extension
     *
     * @param string $extension
     *
     * @return ImageNews
     */
    public function setExtension($url)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return ImageNews
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
}

