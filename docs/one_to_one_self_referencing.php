<?php
/** @Entity **/
class Student
{
    // ...

    /**
     * @OneToOne(targetEntity="Student")
     * @JoinColumn(name="mentor_id", referencedColumnName="id")
     **/
    private $mentor;

    // ...
}