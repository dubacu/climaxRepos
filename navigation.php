<input type="hidden" id="user_role" value="<?php if(isset($_SESSION['user_token'])){echo $_SESSION['user_profile'];} ?>">
<ul class="metismenu" id="menu">
                    <li>
                        <a href="dashboard">
                            <div class="parent-icon"><i class='bx bx-pie-chart-alt'></i>
                            </div>
                            <div class="menu-title">Tableau de bord</div>
                        </a>
                    </li>
                    <li>
                        <a href="users">
                            <div class="parent-icon"><i class='bx bx-user'></i>
                            </div>
                            <div class="menu-title">Utilisateurs</div>
                        </a>
                    </li> 
                    <li>
                        <a href="customers">
                            <div class="parent-icon"><i class='bx bx-group'></i>
                            </div>
                            <div class="menu-title">Clients</div>
                        </a>
                    </li> 
                    <li>
                        <a href="files">
                            <div class="parent-icon"><i class='bx bx-file'></i>
                            </div>
                            <div class="menu-title">Fichiers</div>
                        </a>
                    </li> 
               
</ul>