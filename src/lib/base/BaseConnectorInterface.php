<?php
namespace  ascio\base;

interface BaseConnectorInterface {
    function create();
    function update();
    function delete();
    function get();
    function getAttributes();
    function setAttributes();
    function getParent() : Base;
    function setParent();
}