<?php
if(getRole()!="manajemen")
{
	redirect('login');
}
?>