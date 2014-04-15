<?php namespace assinment3\Resource;

interface ResourceInterface {

    public function getEtag($regen=false);

    public function setResourceName($name);

    public function getResourceName();

}