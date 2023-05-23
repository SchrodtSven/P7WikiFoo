<?php

declare(strict_types=1);
/**
 * Class managing HTTP session handling, abstracting from:
 * 
 *  - super global $_SESSION
 *  - native session_* functions
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P7WikiFoo
 * @package P7WikiFoo
 * @version 0.23
 * @since 2023-05-22
 */
namespace SchrodtSven\P7WikiFoo\Internal\Kernel;

use SchrodtSven\P7WikiFoo\Internal\Type\P7Array;
use SchrodtSven\P7WikiFoo\Internal\Type\P7String;

class SessionManager 
{
    /**
     * Constructor function
     *
     * @param string $sessionName
     */
   public function __construct(private $sessionName = 'P7WikiSessionID')
   {
        session_name($sessionName);
        session_start();
   }

   /**
    * Setter for named property
    *
    * @param string $name
    * @param mixed $value
    * @return self
    */
   public function set(string $name, mixed $value): self
   {
        $_SESSION[$name] = $value;
        return $this;
   }

   /**
    * Getter for named property
    *
    * @param string $name
    * @return mixed
    */
   public function get(string $name): mixed
   {
        return $_SESSION[$name] ?? null;
   }

   /**
    * Check if named property exists
    *
    * @param string $name
    * @return boolean
    */
   public function has(string $name): bool
   {
        return isset($_SESSION[$name]);
   }


   /**
    * Unsetter for named property
    *
    * @param string $name
    * @return void
    */
   public function unset(string $name): void
   {
        unset($_SESSION[$name]);
   }

   /**
    * Rollback to previous state
    *
    * @return boolean
    */
   public function reset(): bool
   {
        return session_reset();
   }

   public function getAll(): array
   {
        return $_SESSION;
   }

   /**
    * Getter for current session status
    *
    * @return string
    */
   public function getStatus(): string
   {
        return match(session_status()) {
            \PHP_SESSION_DISABLED => 'disabled',
            \PHP_SESSION_NONE => 'none',
            \PHP_SESSION_ACTIVE => 'active'
        };
   }

   /**
    * Get the value of sessionName
    * 
    * @return string
    */
   public function getSessionName(): string
   {
      return $this->sessionName;
   }

   /**
    * Set the value of sessionName
    *
    * @param string
    * @return self
    */
   public function setSessionName($sessionName): self
   {
      $this->sessionName = $sessionName;
      return $this;
   }
}