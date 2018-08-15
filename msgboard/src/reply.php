<?php

/**
 * @Entity @Table(name="reply")
 */
class reply
{
    /**
        *@Column(type="integer")
        */
    protected $msgid;
    /**
        *@Id  @Column(type="integer")   @GeneratedValue
        */
    protected $replyid;
    /**
        *@Column(type="string") 
        */
    protected $msg;
    /**
        *@Column(type="string")  
        */
    protected $nick;
    /**
       * @Column(type="string") 
        */
    protected $replytime;
    
    public function getMsgid()
    {
        return $this->msgid;
    }
    public function getReplyid()
    {
        return $this->replyid;
    }
    public function getMsg()
    {
        return $this->msg;
    }
    public function getNick()
    {
        return $this->nick;
    }
    public function getReplytime()
    {
        return $this->replytime;
    }
    public function setMsgid($msgid)
    {
        $this->msgid = $msgid;
    }
    public function setMsg($msg)
    {
        $this->msg = $msg;
    }
    public function setNick($nick)
    {
        $this->nick = $nick;
    }
    public function setReplytime($replytime)
    {
        $this->replytime = $replytime;
    }
}