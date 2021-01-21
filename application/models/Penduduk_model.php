<?php

class Penduduk_model extends CI_Model
{
     //jumlah pend. SMA
     public function jmlsma()
     {
         $query = $this->db->get_where('penduduk',['pend'=>"SMA"]);
         if($query->num_rows() > 0)
         {
             return $query->num_rows();
         }else {
            return 0;
         }
     }

     //jumlah pend. SMP
     public function jmlsmp()
     {
         $query = $this->db->get_where('penduduk',['pend'=>"SMP"]);
         if($query->num_rows() > 0)
         {
             return $query->num_rows();
         }else {
            return 0;
         }
     }

     //jumlah pend. SD
     public function jmlsd()
     {
         $query = $this->db->get_where('penduduk',['pend'=>"SD"]);
         if($query->num_rows() > 0)
         {
             return $query->num_rows();
         }else {
            return 0;
         }
     }

     //jumlah pend. SMA
     public function jmlsarjana()
     {
         $query = $this->db->get_where('penduduk',['pend'=>"Sarjana(S1)"]);
         if($query->num_rows() > 0)
         {
             return $query->num_rows();
         }else {
            return 0;
         }
     }

     public function jmlmagister()
     {
         $query = $this->db->get_where('penduduk',['pend'=>"Magister(S2)"]);
         if($query->num_rows() > 0)
         {
             return $query->num_rows();
         }else {
            return 0;
         }
     }

     public function jmldoktor()
     {
         $query = $this->db->get_where('penduduk',['pend'=>"Doktor(S3)"]);
         if($query->num_rows() > 0)
         {
             return $query->num_rows();
         }else {
            return 0;
         }
     }

     public function jmlprof()
     {
         $query = $this->db->get_where('penduduk',['pend'=>"Profesor"]);
         if($query->num_rows() > 0)
         {
             return $query->num_rows();
         }else {
            return 0;
         }
     }

     //jumlah pend. katolik
     public function jmlkatolik()
     {
         $query = $this->db->get_where('penduduk',['agama'=>"Katolik"]);
         if($query->num_rows() > 0)
         {
             return $query->num_rows();
         }else {
            return 0;
         }
     }

     //jumlah pend. islam
     public function jmlislam()
     {
         $query = $this->db->get_where('penduduk',['agama'=>"Islam"]);
         if($query->num_rows() > 0)
         {
             return $query->num_rows();
         }else {
            return 0;
         }
     }

      //jumlah pend. kristen/protestan
      public function jmlkristen()
      {
          $query = $this->db->get_where('penduduk',['agama'=>"Kristen/Protestan"]);
          if($query->num_rows() > 0)
          {
              return $query->num_rows();
          }else {
             return 0;
          }
      }

      //jumlah pend. Hindu
      public function jmlhindu()
      {
          $query = $this->db->get_where('penduduk',['agama'=>"Hindu"]);
          if($query->num_rows() > 0)
          {
              return $query->num_rows();
          }else {
             return 0;
          }
      }

       //jumlah pend. Budha
       public function jmlbudha()
       {
           $query = $this->db->get_where('penduduk',['agama'=>"Budha"]);
           if($query->num_rows() > 0)
           {
               return $query->num_rows();
           }else {
              return 0;
           }
       }

        //jumlah pend. Konghucu
      public function jmlkonghucu()
      {
          $query = $this->db->get_where('penduduk',['agama'=>"Konghucu"]);
          if($query->num_rows() > 0)
          {
              return $query->num_rows();
          }else {
             return 0;
          }
      }

       //jumlah pend. jk Laki
       public function jmllaki()
       {
           $query = $this->db->get_where('penduduk',['jk'=>"Laki-Laki"]);
           if($query->num_rows() > 0)
           {
               return $query->num_rows();
           }else {
              return 0;
           }
       }

        //jumlah pend. Perempuan
      public function jmlperempuan()
      {
          $query = $this->db->get_where('penduduk',['jk'=>"Perempuan"]);
          if($query->num_rows() > 0)
          {
              return $query->num_rows();
          }else {
             return 0;
          }
      }

}