<?php

/**
 * @Entity @Table(name="msgboard")
 */
class msgboard
{
    /**
        *@Id  @Column(type="integer") @GeneratedValue 
        **/
    protected $id;
    /**
        *@Column(type="string")  
        */
    protected $nick;
    /**
        *@Column(type="string") 
        */
    protected $msg;
    /**
       * @Column(type="string") 
        */
    protected $msgtime;

    public function getId()
    {
        return $this->id;
    }
    public function getNick()
    {
        return $this->nick;
    }
    public function getMsg()
    {
        return $this->msg;
    }
    public function getMsgtime()
    {
        return $this->msgtime;
    }
    public function setNick($nick)
    {
        $this->nick = $nick;
    }
    public function setMsg($msg)
    {
        $this->msg = $msg;
    }
    public function setMsgtime($msgtime)
    {
        $this->msgtime = $msgtime;
    }
    
}
