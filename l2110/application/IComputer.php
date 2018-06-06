<?php

namespace application;

/**
 * Interface IComputer
 * @package application
 */
interface IComputer
{
    function start();

    function shutDown();

    function restart();

    function printParameters();

    function identifyUser();
}
