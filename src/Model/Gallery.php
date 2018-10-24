<?php
/**
 * Created by PhpStorm.
 * User: wcs
 * Date: 23/10/17
 * Time: 10:57
 * PHP version 7
 */

namespace Model;

/**
 * Class Gallery
 *
 */
class Gallery
{
    /**
     * @var
     */
    private $id;

    /**
     * @var
     */
    private $imgName;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getImgName()
    {
        return $this->imgName;
    }

    /**
     * @param mixed $imgName
     */
    public function setImgName($imgName)
    {
        $this->imgName = $imgName;
    }
}
