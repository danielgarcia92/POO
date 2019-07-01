<?php

namespace Game;

class Attack
{
    protected $damage;
    protected $magical;
    protected $key;

    /**
     * Attack constructor.
     * @param $damage
     * @param $magical
     * @param $key
     */
    public function __construct($damage, $magical, $key)
    {
        $this->damage = $damage;
        $this->magical = $magical;
        $this->key = $key;
    }

    /**
     * @return mixed
     */
    public function getDamage()
    {
        return $this->damage;
    }

    /**
     * @return mixed
     */
    public function isMagical()
    {
        return $this->magical;
    }

    /**
     * @return mixed
     */
    public function isPhysical()
    {
        return !$this->magical;
    }

    /**
     * @param Unit $attacker
     * @param Unit $opponent
     * @return mixed
     */
    public function getKey(Unit $attacker, Unit $opponent)
    {
        return Translator::get($this->key, [
            'unit' => $attacker->getName(),
            'opponent' => $opponent->getName()
        ]);
    }

}
