<?php

/*
 * This file is part of the Geotools library.
 *
 * (c) Antoine Corcy <contact@sbin.dk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\Geotools\Coordinate;

use League\Geotools\ArrayCollection;
use League\Geotools\Exception\InvalidArgumentException;



/**
 * @author Gabriel Bull <me@gabrielbull.com>
 */

interface CoordinateInterface
{
    /**
     * Normalizes a latitude to the (-90, 90) range.
     * Latitudes below -90.0 or above 90.0 degrees are capped, not wrapped.
     *
     * @param double $latitude The latitude to normalize
     *
     * @return double
     */
    public function normalizeLatitude($latitude);

    /**
     * Normalizes a longitude to the (-180, 180) range.
     * Longitudes below -180.0 or abode 180.0 degrees are wrapped.
     *
     * @param double $longitude The longitude to normalize
     *
     * @return double
     */
    public function normalizeLongitude($longitude);

    /**
     * Set the latitude.
     *
     * @param double $latitude
     */
    public function setLatitude($latitude);

    /**
     * Get the latitude.
     *
     * @return double
     */
    public function getLatitude();

    /**
     * Set the longitude.
     *
     * @param double $longitude
     */
    public function setLongitude($longitude);

    /**
     * Get the longitude.
     *
     * @return double
     */
    public function getLongitude();

    /**
     * Get the Ellipsoid.
     *
     * @return Ellipsoid
     */
    public function getEllipsoid();
}
class CoordinateCollection extends ArrayCollection
{
    /**
     * @var Ellipsoid
     */
    private $ellipsoid;

    /**
     * CoordinateCollection constructor.
     *
     * @param CoordinateInterface[] $coordinates
     * @param Ellipsoid             $ellipsoid
     */
    public function __construct(array $coordinates = array(), Ellipsoid $ellipsoid = null)
    {
        if ($ellipsoid) {
            $this->ellipsoid = $ellipsoid;
        } elseif (count($coordinates) > 0) {
            $this->ellipsoid = reset($coordinates)->getEllipsoid();
        }

        $this->checkCoordinatesArray($coordinates);

        parent::__construct($coordinates);
    }

    /**
     * @param string     $key
     * @param CoordinateInterface $value
     */
    public function set($key, $value)
    {
        $this->checkEllipsoid($value);
        $this->elements[$key] = $value;
    }

    /**
     * @param  CoordinateInterface $value
     * @return bool
     */
    public function add($value)
    {
        $this->checkEllipsoid($value);
        $this->elements[] = $value;

        return true;
    }

    /**
     * @return Ellipsoid
     */
    public function getEllipsoid()
    {
        return $this->ellipsoid;
    }

    /**
     * @param array CoordinateInterface[] $coordinates
     */
    private function checkCoordinatesArray(array $coordinates)
    {
        foreach ($coordinates as $coordinate) {
            $this->checkEllipsoid($coordinate);
        }
    }

    /**
     * @param CoordinateInterface $coordinate
     *
     * @throws InvalidArgumentException
     */
    private function checkEllipsoid(CoordinateInterface $coordinate)
    {
        if ($this->ellipsoid === null) {
            $this->ellipsoid = $coordinate->getEllipsoid();
        }

        if ($coordinate->getEllipsoid() != $this->ellipsoid) {
            throw new InvalidArgumentException("Ellipsoids don't match");
        }
    }
}
