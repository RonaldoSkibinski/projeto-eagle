<?php
 class Mensagem {
  public $texto;
  public $x,$y;
  public $c1,$c2;
  function __construct($msg) {
    $this->texto = $msg;
  }
  function SetPos ($x,$y) {
    $this->x = $x;
    $this->y = $y;
  }
  function SetFrameColor ($c1,$c2) {
    $this->c1 = $c1;
    $this->c2 = $c2;
  }
  function Show () {
    echo("<div style=\"position:absolute;top:$this->x;left:$this->y;border:1px solid $this->c1;background-color:$this->c2\">
     $this->texto<br><br>
     <input type=\"button\" value=\"Fechar\" onclick=\"this.parentNode.style.visibility='hidden'\">
    </div>");
  }
 }
 
//----------------------------------------------------------------------------------------------------------------------------

  class banco {
    public $res;
    public $cnx;
    public $cheader;

    function __construct() {
      try {

        @$this->cnx = mysqli_connect('localhost', 'root', 'password', 'farmaciaterezinha');

        if(!$this->cnx) {
          die('Não foi possível conectar: ' . mysqli_error($this->cnx));
        }
        echo 'Conexão bem sucedida';

      }catch (Exception $e) {
        echo 'Exceção capturada: ',  @$e->getMessage(), "\n";
      }
      
    }

    // ------- FUNCTION CONSULTA 

    function consulta($sql) {
      $this->res = mysqli_query($this->cnx, $sql);
      if (!$this->res) {
          @die('Invalid query: ' . mysqli_error($this->cnx));
      }  
    }





         function lista($name='tabela',$inc='',$alt='',$exc='',$img='') {
            //Botão de Início
             echo ("<div style='width:100px;
                          height:25px;width: 65px; color:black; background-color:rgba(255,255,255,1); 
                          font-family: Arial Black, Times, serif; border-radius:7px; 
                          border-color: white; text-align: center;'><a href='principal.php'>Inicio</a></div>");
      if($inc) echo("<center><p  style='width:100px;
                          height:25px;color:white; background-color:rgba(255,255,255,1); 
                          font-family: Arial Black, Times, serif; border-radius:7px; 
                          border-color: white, text-align: center;' align=\"center\"><a href=\"$inc\">Incluir</a></p></center>");
      echo("<table id='$name' class='display' cellspacing='0' width='100%'>");
      echo("<thead><tr>");
      for($c=0;$c<count($this->cheader);$c++){
        echo("<th>".$this->cheader[$c]."</th>");
      }
      echo("</tr></thead><tbody>");
      $n=pg_num_fields($this->res);
      $codigo=@pg_field_name($this->res,0);
      while($line=@pg_fetch_object($this->res)){
        echo("<tr>");
        for($c=0; $c<$n;$c++){ 
          $campo=@pg_field_name($this->res,$c);
          echo("<td>".$line->$campo."</td>");
        }
        if($alt or $exc){
           echo("<td align=center>");
           if($alt) echo("<a href=\"$alt?alt=".$line->$codigo."\">Alterar</a> ");
           if($exc) echo("<a href=\"$exc?exc=".$line->$codigo."\">Excluir</a> ");
           echo("</td>");
        }   
        echo("</tr>");
     }        
     echo("</tbody></table>");
     echo("  <script> $(document).ready(function() {
                      $('#$name').DataTable();
                      } );
              </script>");
    }  
    function combobox($nome,$id=0){
      echo("<br><select name=$nome>");
      while($line=@pg_fetch_object($this->res)){
        $codigo=@pg_field_name($this->res,0);
        $nome=@pg_field_name($this->res,1);
          echo("<option value='".$line->$codigo."'>".$line->$nome."</option>");
      }        
      echo("</select>");  
    }
    function lista2($site='', $site2='') {
      echo("<table id='example' class='display' cellspacing='0' width='100%'>");
      echo("<thead><tr>");
          for($c=0;$c<count($this->cheader);$c++){
            echo("<th>".$this->cheader[$c]."</th>");
          }
      echo("</tr></thead><tbody>");
      $n=pg_num_fields($this->res);
      while($line=@pg_fetch_object($this->res)){
        echo("<tr>");
        for($c=0; $c<$n;$c++){ 
          $campo=@pg_field_name($this->res,$c);
          echo("<td>".$line->$campo."</td>");
        }
        echo("<td><a href=\"$site.php?x1=$line->codusu&f1='a'\"><button style=\"width: 80px;\">Alterar</button></a>");
        echo("<a href=\"$site2.php?excl=$line->codusu\"><button style=\"width: 80px;\">Excluir</button></a>");
        echo("<a href=\"$site2.php?bloq=$line->codusu\"><button style=\"width: 160px;\">Bloquear/Desbloquear</button></a></td>");
        echo("</tr>");
      }        
      echo("</tbody></table>");
      echo("  <script>
                $(document).ready(function() {
                  $('#example').DataTable();
                } );
              </script>");
  
    }
    function lista3($site1='', $site2='') {
      echo("<table align='center' id='example1' class='display' cellspacing='0' width='100%'>");
      echo("<thead><tr>");
          for($c=0;$c<count($this->cheader);$c++){
            echo("<th>".$this->cheader[$c]."</th>");
          }
      echo("</tr></thead><tbody>");
      $n=pg_num_fields($this->res);
      while($line=@pg_fetch_object($this->res)){
        echo("<tr>");
        for($c=0; $c<$n;$c++){ 
          $campo=@pg_field_name($this->res,$c);
          echo("<td>".$line->$campo."</td>");
        }
        echo("<td><a href=\"$site1.php?x1=$line->cod&f1=$line->cod\"><button style=\"width: 80px;\">Alterar</button></a>");
        echo("<a href=\"$site2.php?exclfilm=$line->cod\"><button style=\"width: 80px;\">Excluir</button></a>");
        echo("</tr>");
      }        
      echo("</tbody></table>");
      echo("  <script>
                $(document).ready(function() {
                  $('#example1').DataTable();
                } );
              </script>");
  
    }
    function listafil($x) {
      echo("<div id='$x'><table align='center' width='100%'>");
      $cheader=array();
      $cheader1=array();
      $cheader2=array();
      $c=0;
      $n=3;
      $c1=1;
      $n1=0;
      while($c1>$n1){
      echo("<tr>");
          for($c;$c<$n;$c++){
            $cheader[$c]=@pg_fetch_result($this->res, $c, 'img');
            $cheader2[$c]=@pg_fetch_result($this->res, $c, 'nomfil');
            if($cheader[$c]==''){
              break;
            }else{
              $cheader1[$c]=@pg_fetch_result($this->res, $c, 'cod');
              echo("<td class='listafilme' align='center' style=\"padding: 15px;\"><div><a style='text-decoration:none;' href=\"usuario.php?x1='filmeap'&filmeap=$cheader1[$c]\">
              <p><font color='white'>$cheader2[$c]</font></p>
              <img src=\"include/filmes/icones/$cheader[$c]\" style=\"width:200px; height:250px; cursor: pointer;\"></img></a></div></td>");
            }
          }
          if($c-$n == 0){
            echo("</tr>");
            $n=$n+5;
          }else{
            break;
          }
      }
      echo("</table></div>");
    }
    
    function apfilme(){
    $nomfil=pg_fetch_result($this->res, 0, 'nomfil');
    $descfil=pg_fetch_result($this->res, 0, 'descfil'); 
    $tp2=pg_fetch_result($this->res, 'tipofil');
    $tp=pg_query("select tipo from tipo INNER JOIN filmes ON( tipo.codtipo = $tp2)"); 
    $tipofil=pg_fetch_result($tp, 0, 'tipo');
    $img=pg_fetch_result($this->res, 0, 'img');
    $trailer=pg_fetch_result($this->res, 0, 'trailer');
    echo("
      <div id='saivideo'style=\"position:fixed; top:0px; left: 94%; \"><a href=\"user.php?x1='saifil'\"><img src='img/x.png' style=\"width:60px; cursor: pointer;\"></img></a></div>
      <div id='videoap' style=\"position:fixed; top:200px; left: 390px; bottom: 0px; \">
      <video id='videoap' width=\"720\" height=\"320\" controls=\"controls\" autoplay=\"autoplay\">
        <source src=\"trailers/$trailer\" type=\"video/mp4\">
        <object data=\"\" width=\"420\" height=\"340\">
        <embed id='videoap1' width=\"720\" height=\"320\" src=\"trailers/$trailer\">
        </object>
      </video>
      </div>
      <div style=\"font-size:40px; color: white; position:fixed; top:18px; left: 10px; bottom: 0px;\">$nomfil</div>
      <div style=\"font-size:15px; color: white; position:fixed; top:480px; left: 10px; bottom: 0px;\"><h2>Genero:$tipofil<br><br> Sinopse:</h2> <br>$descfil</div>
      <div id='bgfundo' style=\"background-color:#000000; width:100%; height:320px; opacity: 0.73; position:fixed; top:200px; left: 0px; bottom: 0px;\"></div>
      <div id='bgfundovideo' style=\"background: url(filmes/icones/$img); width:100%; background-height:100%; opacity: 0.23; position:fixed; top:0px; left: 0px; bottom: 0px;\"></div>");
    }
    function escimg(){
      echo("<div id='escimg'><table>");
      $line=pg_num_rows($this->res);
      for($c=0;$c<$line;$c++){  
        $imagem1=pg_fetch_result($this->res, $c, 'nomeimg');
      echo("<tr><td align='center' style=\"background-color: #dfdfdf; width:93px;\"><a href=\"user.php?x1='alteraimg'&f=$imagem1&p=$_GET[p]\"><img src='img/$imagem1' name='$imagem1' style=\"width:60px; cursor: pointer;\"></img></a></td></tr>");
      }
      echo("</table></div>");
    }
  }
  //================================================================================
  function head(){
     echo("<html>
            <head>
                <link rel='stylesheet' href='../DT/media/css/jquery.dataTables.min.css'>
                <script src='../javascript/jquery.js'></script>
                <script src='../DT/media/js/jquery.dataTables.min.js'></script>
                <script src='../jqueryrotate.js'></script>
            </head>
            <link rel=\"stylesheet\" href=\"../css/css.css\">");
  
  }
  function foot(){
     echo("</body></html>");
  }
  //----------------------------------------------------------------------------------------------------------------------------
  Class form{
  public $campo=array();
     public $titulo,$method='POST',$action='';
     function __construct($titulo='Formulário',$action='',$method=''){
        $this->titulo=$titulo;
        $this->action=$action;
        $this->method=$method;
     }
     function text($name='obj',$caption='Campo',$size=30,$maxlenght='',$obrig=''){
        $this->campo[$name]['type']='text';
        $this->campo[$name]['name']=$name;
        $this->campo[$name]['caption']=$caption;
        $this->campo[$name]['size']=$size;
        $this->campo[$name]['maxlenght']=$maxlenght;
        $this->campo[$name]['obrig']=$obrig;
     }
       function time($name='obj',$caption='Campo',$obrig=''){
        $this->campo[$name]['type']='time';
        $this->campo[$name]['name']=$name;
        $this->campo[$name]['caption']=$caption;
        $this->campo[$name]['obrig']=$obrig;
       }
       function date($name='obj',$caption='Campo',$obrig=''){
        $this->campo[$name]['type']='date';
        $this->campo[$name]['name']=$name;
        $this->campo[$name]['caption']=$caption;
        $this->campo[$name]['obrig']=$obrig;
       }
     //Campo oculto
     function hidden($name='obj',$value=''){
        $this->campo[$name]['type']='hidden';
        $this->campo[$name]['name']=$name;
        $this->campo[$name]['value']=$value;
     }
     function password($name='obj',$caption='Senha',$size=30,$maxlenght='',$obrig=''){
        $this->campo[$name]['type']='password';
        $this->campo[$name]['name']=$name;
        $this->campo[$name]['caption']=$caption;
        $this->campo[$name]['size']=$size;
        $this->campo[$name]['maxlenght']=$maxlenght;
        $this->campo[$name]['obrig']=$obrig;
     }
     function select($name='obj',$caption='Selecione',$options=array('selecione'),$obrig=''){
        $this->campo[$name]['type']='select';
        $this->campo[$name]['name']=$name;
        $this->campo[$name]['caption']=$caption;
        $this->campo[$name]['options']=$options;
        $this->campo[$name]['obrig']=$obrig;
     }
     //Faz um select de info q vem do banco
     function dbselect($name='obj',$caption='Selecione',$res,$obrig=''){
        $this->campo[$name]['type']='dbselect';
        $this->campo[$name]['name']=$name;
        $this->campo[$name]['caption']=$caption;
        $campo1=@pg_field_name($res,0);
        $campo2=@pg_field_name($res,1);
        while($reg=@pg_fetch_object($res)){
           $options_id[]=$reg->$campo1;
           $options_dt[]=$reg->$campo2;
        }
        $this->campo[$name]['options_id']=$options_id;
        $this->campo[$name]['options_dt']=$options_dt;
        $this->campo[$name]['obrig']=$obrig;
     }
     function radio($name='obj',$caption='Selecione',$options=array('selecione')){
        $this->campo[$name]['type']='radio';
        $this->campo[$name]['name']=$name;
        $this->campo[$name]['caption']=$caption;
        $this->campo[$name]['options']=$options;
     }
     function imagem($name='obj',$caption='Campo',$obrig=''){
        $this->campo[$name]['type']='file';
        $this->campo[$name]['name']=$name;
        $this->campo[$name]['caption']=$caption;
        $this->campo[$name]['obrig']=$obrig;
     }
     //Le informações do banco e preenche os campos
     function carrega($reg){
        foreach(array_keys($this->campo) as $key){
           @$this->campo[$key]['value']=$reg->$key;
        }   
     }
     function show($name='frm', $pag='',$met='', $acao=''){
        echo("<script language=\"javascript\">");
        echo("   function valida$name(){ \n");
        echo("      var erro='';\n");
        foreach(array_keys($this->campo) as $key){
           if(@$this->campo[$key]['obrig']!=''){
              echo("      if(document.$name.".$this->campo[$key]['name'].".value==''){erro+='Verifique o campo \"".$this->campo[$key]['caption']."\" preenchido incorretamente...\\n';}\n");
           }
        }
        echo("      if (erro==''){if (confirm('Confirma os dados digitados?')){document.$name.submit();}}else{alert(erro);}\n");
        echo("   }\n");
        echo("</script>");   
        echo("<form name=\"$name\" id=\"$name\" action=\"".$pag.".php?x=".$acao."\" method=\"".$met."\" enctype=\"multipart/form-data\">\n");
        echo("<table border=\"0\" align=\"center\" width=\"90%\">\n");
        echo("<tr><th align=\"center\" colspan=2><b>$this->titulo</b></th></tr>\n");
        foreach(array_keys($this->campo) as $key){
           if(@$this->campo[$key]['maxlenght']){$maxlenght=" maxlenght=\"".$this->campo[$key]['maxlenght']."\" ";}else{$maxlenght='';}
           if($this->campo[$key]['type']=='text'){
              echo("<tr><td align=\"right\"><b>".$this->campo[$key]['caption']." : </b></td><td><input type=\"".$this->campo[$key]['type']."\" name=\"".$this->campo[$key]['name']."\" size=\"".$this->campo[$key]['size']."\" $maxlenght value=\"".@$this->campo[$key]['value']."\"></td></tr>\n");
           }elseif($this->campo[$key]['type']=='file'){
              echo("<tr><td align=\"right\"><b>".$this->campo[$key]['caption']." : </b></td><td><input type=\"".$this->campo[$key]['type']."\" name=\"".$this->campo[$key]['name']."\" ></td></tr>\n");
           }elseif($this->campo[$key]['type']=='select'){
              echo("<tr><td align=\"right\"><b>".$this->campo[$key]['caption']." : </b></td><td><select name=\"".$this->campo[$key]['name']."\">\n");
              echo("<option value=''> Selecione</option>\n");
              for($c=0;$c<count($this->campo[$key]['options']);$c++){
                 if($this->campo[$key]['value']==$this->campo[$key]['options'][$c]){$sel="selected";}else{$sel="";}
                 echo("<option value=\"".$this->campo[$key]['options'][$c]."\">".$this->campo[$key]['options'][$c]."</option>\n");
              }
              echo("</select></td></tr>\n");
           }elseif($this->campo[$key]['type']=='time'){
           echo("<tr><td align=\"right\"><b>".$this->campo[$key]['caption']." : </b></td><td><input type=\"".$this->campo[$key]['type']."\" name=\"".$this->campo[$key]['name']."\" value=\"".@$this->campo[$key]['value']."\"></td></tr>\n");
           }elseif($this->campo[$key]['type']=='date'){
           echo("<tr><td align=\"right\"><b>".$this->campo[$key]['caption']." : </b></td><td><input type=\"".$this->campo[$key]['type']."\" name=\"".$this->campo[$key]['name']."\" value=\"".@$this->campo[$key]['value']."\"></td></tr>\n");
           }elseif($this->campo[$key]['type']=='dbselect'){
              echo("<tr><td align=\"right\"><b>".$this->campo[$key]['caption']." : </b></td><td><select name=\"".$this->campo[$key]['name']."\">\n");
              echo("<option value=''> Selecione</option>\n");
              for($c=0;$c<count($this->campo[$key]['options_id']);$c++){
                 if($this->campo[$key]['value']==$this->campo[$key]['options_id'][$c]){$sel="selected";}else{$sel="";}
                 echo("<option $sel value=\"".$this->campo[$key]['options_id'][$c]."\">".$this->campo[$key]['options_dt'][$c]."</option>\n");
              }
              echo("</select></td></tr>\n");
           }elseif($this->campo[$key]['type']=='radio'){
              echo("<tr><td align=\"right\"><b>".$this->campo[$key]['caption']." : </b></td><td>\n");
              for($c=0;$c<count($this->campo[$key]['options']);$c++){
                 if(@$this->campo[$key]['value']==$this->campo[$key]['options'][$c]){$sel="selected";}else{$sel="";}
                 echo("<input type=\"radio\" name=\"".$this->campo[$key]['name']."\" value=\"".$this->campo[$key]['options'][$c]."\"> ".$this->campo[$key]['options'][$c]."<br>\n");
              }
              echo("</td></tr>\n");
           }elseif($this->campo[$key]['type']=='password'){
              echo("<tr><td align=\"right\"><b>".$this->campo[$key]['caption']." : </b></td><td><input type=\"".$this->campo[$key]['type']."\" name=\"".$this->campo[$key]['name']."\" size=\"".$this->campo[$key]['size']."\" $maxlenght></td></tr>\n");
           }elseif($this->campo[$key]['type']=='hidden'){
              echo("<input type=\"".$this->campo[$key]['type']."\" name=\"".$this->campo[$key]['name']."\" value=\"".$this->campo[$key]['value']."\">\n");
           }     
        }
        if($pag==''){
           echo("<tr><th align=\"center\" colspan=2><input type=\"button\" id=\"salvaai\" value=\"SALVAR\" onclick=\"valida$name()\"></th></tr>\n");
        }else{
           echo("<tr><th align=\"center\" colspan=2><input type=\"submit\" id=\"salvaai\" value=\"SALVAR\" \"></th></tr>\n");
        }   
        echo("</table>\n</form>\n");
     }
  } 
   