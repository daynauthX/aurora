<?php namespace assignment3\Resource;

interface CollectionInterface {

    public function getEtags($regen=false);

    public function setCollectionName($name);

    public function getCollectionName();

}