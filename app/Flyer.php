<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
    protected $table = "flyers";
    /**
     * Fillable fields for a flyer
     *
     * @var array
     */
    protected $fillable = ['photo', 'street', 'city', 'zip', 'state', 'country', 'price', 'description'];


    /**
     * Find the flyer at a given address.
     *
     * @param string $zip
     * @param string $street
     * @return Builder
     */
    public static function locatedAt($zip, $street)
    {

        $street = str_replace('-', ' ', $street);


        return static::where(compact('zip', 'street'))->first();
    }

    /**
     * Get the sales price in dollars
     *
     * @param Integer $price
     * @return string
     */
    public function getPriceAttribute($price)
    {
        return '$' . number_format($price / 100);
    }

    /**
     * @param Photo $photo
     * @return Flyer
     */
    public function addPhoto(Photo $photo)
    {
        return $this->photos()->save($photo);
    }

    /**
     * Set the sales price in cents
     *
     * @param Integer $price
     * @return Integer
     */
    public function setPriceAttribute($price)
    {

        return $this->attributes['price']  =  $price * 100;
    }


    /**
     * A flyer is composed of many photos
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }
}
