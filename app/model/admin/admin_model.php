<?php

/**
 * Scoped `api_admin` class model for `a_company` table
 *
 * @version 1.0.0
 *
 * @package Model\Admin\API
 * @since 1.0.0
 */
class Admin_Model extends SENE_Model
{

  public $tbl = "admin";
  public $tbl_as = "admin";

  public function __construct()
  {
    parent::__construct();
    $this->db->from($this->tbl, $this->tbl_as);
    date_default_timezone_set($this->config->timezone);
  }

  public function auth($cred)
  {
    $this->db->from($this->tbl, $this->tbl_as);
    $this->db->where("$this->tbl_as.email", $cred, "OR", "=");
    $this->db->where("$this->tbl_as.username", $cred, "OR", "=");
    return $this->db->get();
  }
  public function getById($id)
  {
    $this->db->from($this->tbl, $this->tbl_as);
    $this->db->where("id", $id);
    return $this->db->get_first('', 0);
  }
}
