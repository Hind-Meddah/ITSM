  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-lightblue elevation-2">
      <!-- Brand Logo -->
      <a href="{{ route('dashboard') }}" class="brand-link border-bottom">
          <img src="dist/img/logo.png" alt="ofppt Logo" class="brand-image img-circle elevation-2" style="opacity: .8">
          <span class="brand-text font-weight-bold text-info"> SGPI OFPPT </span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 bg-light py-2 rounded mb-3 d-flex">
              <div class="image">
                  <img src="dist/img/user.jpg" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">{{ Auth::user()->First_name . ' ' . Auth::user()->Last_name }}</a>

              </div>
          </div>

          <!-- SidebarSearch Form -->

          <!-- Sidebar Menu -->
          @if (Auth::check() && Auth::user()->Role == 'ADMIN')
              <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                      data-accordion="false">

                      <!-- <li class="nav-header">EXEMPLE MULTI NIVEAU</li> -->
                      <li class="nav-item">
                          <a href="{{ route('dashboard') }}"
                              class="{{ request()->is('/') ? 'nav-link active' : 'nav-link' }}">
                              <i class="fas fa-tachometer-alt nav-icon"></i>
                              <p>Tableau de bord</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('personalinfo') }}"
                              class="{{ request()->is('Personal-info') ? 'nav-link active' : 'nav-link' }}">
                              <i class="fas fa-info-circle nav-icon"></i>
                              <p>Infos personnelles</p>
                          </a>
                      </li>
                      <li
                          class="{{ request()->is('Computer') || request()->is('Moniteur') || request()->is('Clavier') || request()->is('Souris') || request()->is('Router') || request()->is('Switch') || request()->is('Camera') || request()->is('Imprimante') || request()->is('Access-Point') || request()->is('activity-devices') ? 'nav-item menu-open' : 'nav-item' }}">
                          <a href="#"
                              class="{{ request()->is('Computer') || request()->is('Moniteur') || request()->is('Clavier') || request()->is('Souris') || request()->is('Router') || request()->is('Switch') || request()->is('Camera') || request()->is('Imprimante') || request()->is('Access-Point') || request()->is('activity-devices') ? 'nav-link active' : 'nav-link' }}">
                              <i class="nav-icon fas fa-box"></i>
                              <p>
                                  Parc
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('computer') }}"
                                      class="{{ request()->is('Computer') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fa fa-laptop nav-icon"></i>
                                      <p>Ordinateurs</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="#"
                                      class="{{ request()->is('Moniteur') || request()->is('Clavier') || request()->is('Souris') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fab fa-usb nav-icon"></i>
                                      <p>
                                          Accessoires
                                          <i class="right fas fa-angle-left"></i>
                                      </p>
                                  </a>
                                  <ul class="nav nav-treeview">
                                      <li class="nav-item">
                                          <a href="{{ route('moniteur') }}"
                                              class="{{ request()->is('Moniteur') ? 'nav-link active' : 'nav-link' }}">
                                              <i class="fa fa-desktop nav-icon"></i>
                                              <p>Moniteurs</p>
                                          </a>
                                      </li>
                                      <li class="nav-item">
                                          <a href="{{ route('keyboard') }}"
                                              class="{{ request()->is('Clavier') ? 'nav-link active' : 'nav-link' }}">
                                              <i class="fa fa-keyboard nav-icon"></i>
                                              <p>Claviers</p>
                                          </a>
                                      </li>
                                      <li class="nav-item">
                                          <a href="{{ route('mouse') }}"
                                              class="{{ request()->is('Souris') ? 'nav-link active' : 'nav-link' }}">
                                              <i class="fa fa-mouse nav-icon"></i>
                                              <p>Souris</p>
                                          </a>
                                      </li>
                                  </ul>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('router') }}"
                                      class="{{ request()->is('Router') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fa fa-server nav-icon"></i>
                                      <p>Routeur</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('switch') }}"
                                      class="{{ request()->is('Switch') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fas fa-network-wired nav-icon"></i>
                                      <p>Commutateur</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('camera') }}"
                                      class="{{ request()->is('Camera') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fas fa-video nav-icon"></i>
                                      <p>Caméra</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('printer') }}"
                                      class="{{ request()->is('Imprimante') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fa fa-print nav-icon"></i>
                                      <p>Imprimantes</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('access-point') }}"
                                      class="{{ request()->is('Access-Point') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fa fa-wifi nav-icon"></i>
                                      <p>Point d'accès</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('activity-devices') }}"
                                      class="{{ request()->is('activity-devices') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fas fa-history nav-icon"></i>
                                      <p>Historique matériel</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                      <li
                          class="{{ request()->is('etablissements') || request()->is('salles') || request()->is('utilisateur') || request()->is('ajouter-utilisateur') ? 'nav-item menu-open' : 'nav-item' }}">
                          <a href="#"
                              class="{{ request()->is('etablissements') || request()->is('salles') || request()->is('utilisateur') || request()->is('ajouter-utilisateur') ? 'nav-link active' : 'nav-link' }}">
                              <i class="nav-icon fas fa-sliders-h"></i>
                              <p>
                                  Gestion
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('establishment') }}"
                                      class="{{ request()->is('etablissements') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fas fa-building nav-icon"></i>
                                      <p>Établissements</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('class') }}"
                                      class="{{ request()->is('salles') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fas fa-school nav-icon"></i>
                                      <p>Salles</p>
                                  </a>
                              </li>
                              <li
                                  class="{{ request()->is('utilisateurs') || request()->is('ajouter-utilisateur') ? 'nav-item menu-open' : 'nav-item' }}">
                                  <a href="#"
                                      class="{{ request()->is('utilisateurs') || request()->is('ajouter-utilisateur') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fa fa-users nav-icon"></i>
                                      <p>
                                          Utilisateurs
                                          <i class="right fas fa-angle-left"></i>
                                      </p>
                                  </a>
                                  <ul class="nav nav-treeview">
                                      <li class="nav-item">
                                          <a href="{{ route('ajouter-utilisateur') }}"
                                              class="{{ request()->is('ajouter-utilisateur') ? 'nav-link active' : 'nav-link' }}">
                                              <i class="fa fa-user-plus nav-icon"></i>
                                              <p>Ajouter utilisateur</p>
                                          </a>
                                      </li>
                                      <li class="nav-item">
                                          <a href="{{ route('utilisateur') }}"
                                              class="{{ request()->is('utilisateurs') ? 'nav-link active' : 'nav-link' }}">
                                              <i class="fa fa-user-cog nav-icon"></i>
                                              <p>Liste utilisateurs</p>
                                          </a>
                                      </li>
                                  </ul>
                              </li>
                          </ul>
                      </li>
                      <li
                          class="{{ request()->is('Tickets') || request()->is('New-Ticket') ? 'nav-item menu-open' : 'nav-item' }}">
                          <a href="#"
                              class="{{ request()->is('Tickets') || request()->is('New-Ticket') || request()->is('history-tickets') ? 'nav-link active' : 'nav-link' }}">
                              <i class="nav-icon fas fa-headset"></i>
                              <p>
                                  Assistance
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('tickets') }}"
                                      class="{{ request()->is('Tickets') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fas fa-info-circle nav-icon"></i>
                                      <p>Tickets</p>
                                  </a>
                              </li>
                              {{-- <li class="nav-item">
                            <a href="{{ route('newticket') }}" class="{{ request()->is('New-Ticket') ? 'nav-link active' : 'nav-link' }}">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Créer un ticket</p>
                            </a>
                        </li> --}}
                              <li class="nav-item">
                                  <a href="{{ route('notificationHistory') }}"
                                      class="{{ request()->is('history-tickets') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fas fa-history nav-icon"></i>
                                      <p>Historique des tickets</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                      <li
                          class="{{ request()->is('Modele') || request()->is('Processors') || request()->is('Marque') || request()->is('OS') || request()->is('types') ? 'nav-item menu-open' : 'nav-item' }}">
                          <a href="#"
                              class="{{ request()->is('Modele') || request()->is('Processors') || request()->is('Marque') || request()->is('OS') || request()->is('types') ? 'nav-link active' : 'nav-link' }}">
                              <i class="nav-icon fas fa-cog"></i>
                              <p>
                                  Configuration
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('modele') }}"
                                      class="{{ request()->is('Modele') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fas fa-cube nav-icon"></i>
                                      <p>Modèles</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('processor') }}"
                                      class="{{ request()->is('Processors') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fas fa-microchip nav-icon"></i>
                                      <p>Processeurs</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('marque') }}"
                                      class="{{ request()->is('Marque') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fas fa-tag nav-icon"></i>
                                      <p>Marques</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('OS') }}"
                                      class="{{ request()->is('OS') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fab fa-windows nav-icon"></i>
                                      <p>Systèmes d'exploitation</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('types') }}"
                                      class="{{ request()->is('Types') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fas fa-tasks nav-icon"></i>
                                      <p>Types</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                  </ul>
              </nav>
          @elseif (Auth::check() && Auth::user()->Role == 'TECH')
              <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                      data-accordion="false">

                      <!-- <li class="nav-header">EXEMPLE MULTI NIVEAU</li> -->
                      <li class="nav-item">
                          <a href="{{ route('dashboard') }}"
                              class="{{ request()->is('/') ? 'nav-link active' : 'nav-link' }}">
                              <i class="fas fa-tachometer-alt nav-icon"></i>
                              <p>Tableau de bord</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('personalinfo') }}"
                              class="{{ request()->is('Personal-info') ? 'nav-link active' : 'nav-link' }}">
                              <i class="fas fa-info-circle nav-icon"></i>
                              <p>Infos personnelles</p>
                          </a>
                      </li>
                      <li
                          class="{{ request()->is('Computer') || request()->is('Moniteur') || request()->is('Clavier') || request()->is('Souris') || request()->is('Router') || request()->is('Switch') || request()->is('Camera') || request()->is('Imprimante') || request()->is('Access-Point') || request()->is('activity-devices') ? 'nav-item menu-open' : 'nav-item' }}">
                          <a href="#"
                              class="{{ request()->is('Computer') || request()->is('Moniteur') || request()->is('Clavier') || request()->is('Souris') || request()->is('Router') || request()->is('Switch') || request()->is('Camera') || request()->is('Imprimante') || request()->is('Access-Point') || request()->is('activity-devices') ? 'nav-link active' : 'nav-link' }}">
                              <i class="nav-icon fas fa-box"></i>
                              <p>
                                  Parc
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('computer') }}"
                                      class="{{ request()->is('Computer') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fa fa-laptop nav-icon"></i>
                                      <p>Ordinateurs</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="#"
                                      class="{{ request()->is('Moniteur') || request()->is('Clavier') || request()->is('Souris') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fab fa-usb nav-icon"></i>
                                      <p>
                                          Accessoires
                                          <i class="right fas fa-angle-left"></i>
                                      </p>
                                  </a>
                                  <ul class="nav nav-treeview">
                                      <li class="nav-item">
                                          <a href="{{ route('moniteur') }}"
                                              class="{{ request()->is('Moniteur') ? 'nav-link active' : 'nav-link' }}">
                                              <i class="fa fa-desktop nav-icon"></i>
                                              <p>Moniteurs</p>
                                          </a>
                                      </li>
                                      <li class="nav-item">
                                          <a href="{{ route('keyboard') }}"
                                              class="{{ request()->is('Clavier') ? 'nav-link active' : 'nav-link' }}">
                                              <i class="fa fa-keyboard nav-icon"></i>
                                              <p>Claviers</p>
                                          </a>
                                      </li>
                                      <li class="nav-item">
                                          <a href="{{ route('mouse') }}"
                                              class="{{ request()->is('Souris') ? 'nav-link active' : 'nav-link' }}">
                                              <i class="fa fa-mouse nav-icon"></i>
                                              <p>Souris</p>
                                          </a>
                                      </li>
                                  </ul>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('router') }}"
                                      class="{{ request()->is('Router') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fa fa-server nav-icon"></i>
                                      <p>Routeur</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('switch') }}"
                                      class="{{ request()->is('Switch') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fas fa-network-wired nav-icon"></i>
                                      <p>Commutateur</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('camera') }}"
                                      class="{{ request()->is('Camera') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fas fa-video nav-icon"></i>
                                      <p>Caméra</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('printer') }}"
                                      class="{{ request()->is('Imprimante') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fa fa-print nav-icon"></i>
                                      <p>Imprimantes</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('access-point') }}"
                                      class="{{ request()->is('Access-Point') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fa fa-wifi nav-icon"></i>
                                      <p>Point d'accès</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('activity-devices') }}"
                                      class="{{ request()->is('activity-devices') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fas fa-history nav-icon"></i>
                                      <p>Historique matériel</p>
                                  </a>
                              </li>
                          </ul>
                      </li>

                      <li class="{{ request()->is('Ticket-tech') ? 'nav-item menu-open' : 'nav-item' }}">
                          <a href="#"
                              class="{{ request()->is('Ticket-tech') ? 'nav-link active' : 'nav-link' }}">
                              <i class="nav-icon fas fa-headset"></i>
                              <p>
                                  Assistance
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('tickets-tech') }}"
                                      class="{{ request()->is('Ticket-tech') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fas fa-info-circle nav-icon"></i>
                                      <p>Tickets</p>
                                  </a>
                              </li>

                              <li class="nav-item">
                                  <a href="{{ route('notificationHistory') }}"
                                      class="{{ request()->is('history-tickets') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fas fa-history nav-icon"></i>
                                      <p>Historique des tickets</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                      <li
                          class="{{ request()->is('Modele') || request()->is('Processors') || request()->is('Marque') || request()->is('OS') || request()->is('types') ? 'nav-item menu-open' : 'nav-item' }}">
                          <a href="#"
                              class="{{ request()->is('Modele') || request()->is('Processors') || request()->is('Marque') || request()->is('OS') || request()->is('types') ? 'nav-link active' : 'nav-link' }}">
                              <i class="nav-icon fas fa-cog"></i>
                              <p>
                                  Configuration
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('modele') }}"
                                      class="{{ request()->is('Modele') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fas fa-cube nav-icon"></i>
                                      <p>Modèles</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('processor') }}"
                                      class="{{ request()->is('Processors') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fas fa-microchip nav-icon"></i>
                                      <p>Processeurs</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('marque') }}"
                                      class="{{ request()->is('Marque') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fas fa-tag nav-icon"></i>
                                      <p>Marques</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('OS') }}"
                                      class="{{ request()->is('OS') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fab fa-windows nav-icon"></i>
                                      <p>Systèmes d'exploitation</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('types') }}"
                                      class="{{ request()->is('types') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fas fa-tasks nav-icon"></i>
                                      <p>Types</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                  </ul>
              </nav>
          @elseif (Auth::check() && Auth::user()->Role == 'USER')
              <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                      data-accordion="false">

                      <!-- <li class="nav-header">EXEMPLE MULTI NIVEAU</li> -->
                      <li class="nav-item">
                          <a href="{{ route('dashboard') }}"
                              class="{{ request()->is('/') ? 'nav-link active' : 'nav-link' }}">
                              <i class="fas fa-tachometer-alt nav-icon"></i>
                              <p>Tableau de bord</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('personalinfo') }}"
                              class="{{ request()->is('Personal-info') ? 'nav-link active' : 'nav-link' }}">
                              <i class="fas fa-info-circle nav-icon"></i>
                              <p>Infos personnelles</p>
                          </a>
                      </li>
                      <li
                          class="{{ request()->is('Computer') || request()->is('Moniteur') || request()->is('Clavier') || request()->is('Souris') || request()->is('Router') || request()->is('Switch') || request()->is('Camera') || request()->is('Imprimante') || request()->is('Access-Point') || request()->is('activity-devices') ? 'nav-item menu-open' : 'nav-item' }}">
                          <a href="#"
                              class="{{ request()->is('Computer') || request()->is('Moniteur') || request()->is('Clavier') || request()->is('Souris') || request()->is('Router') || request()->is('Switch') || request()->is('Camera') || request()->is('Imprimante') || request()->is('Access-Point') || request()->is('activity-devices') ? 'nav-link active' : 'nav-link' }}">
                              <i class="nav-icon fas fa-box"></i>
                              <p>
                                  Parc
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('computer') }}"
                                      class="{{ request()->is('Computer') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fa fa-laptop nav-icon"></i>
                                      <p>Ordinateurs</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="#"
                                      class="{{ request()->is('Moniteur') || request()->is('Clavier') || request()->is('Souris') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fab fa-usb nav-icon"></i>
                                      <p>
                                          Accessoires
                                          <i class="right fas fa-angle-left"></i>
                                      </p>
                                  </a>
                                  <ul class="nav nav-treeview">
                                      <li class="nav-item">
                                          <a href="{{ route('moniteur') }}"
                                              class="{{ request()->is('Moniteur') ? 'nav-link active' : 'nav-link' }}">
                                              <i class="fa fa-desktop nav-icon"></i>
                                              <p>Moniteurs</p>
                                          </a>
                                      </li>
                                      <li class="nav-item">
                                          <a href="{{ route('keyboard') }}"
                                              class="{{ request()->is('Clavier') ? 'nav-link active' : 'nav-link' }}">
                                              <i class="fa fa-keyboard nav-icon"></i>
                                              <p>Claviers</p>
                                          </a>
                                      </li>
                                      <li class="nav-item">
                                          <a href="{{ route('mouse') }}"
                                              class="{{ request()->is('Souris') ? 'nav-link active' : 'nav-link' }}">
                                              <i class="fa fa-mouse nav-icon"></i>
                                              <p>Souris</p>
                                          </a>
                                      </li>
                                  </ul>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('router') }}"
                                      class="{{ request()->is('Router') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fa fa-server nav-icon"></i>
                                      <p>Routeur</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('switch') }}"
                                      class="{{ request()->is('Switch') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fas fa-network-wired nav-icon"></i>
                                      <p>Commutateur</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('camera') }}"
                                      class="{{ request()->is('Camera') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fas fa-video nav-icon"></i>
                                      <p>Caméra</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('printer') }}"
                                      class="{{ request()->is('Imprimante') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fa fa-print nav-icon"></i>
                                      <p>Imprimantes</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('access-point') }}"
                                      class="{{ request()->is('Access-Point') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fa fa-wifi nav-icon"></i>
                                      <p>Point d'accès</p>
                                  </a>
                              </li>

                          </ul>
                      </li>
                      <li
                          class="{{ request()->is('Tickets-user') || request()->is('New-Ticket') ? 'nav-item menu-open' : 'nav-item' }}">
                          <a href="#"
                              class="{{ request()->is('Tickets-user') || request()->is('New-Ticket') ? 'nav-link active' : 'nav-link' }}">
                              <i class="nav-icon fas fa-headset"></i>
                              <p>
                                  Assistance
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="{{ route('tickets-user') }}"
                                      class="{{ request()->is('Tickets-user') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fas fa-info-circle nav-icon"></i>
                                      <p>Tickets</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="{{ route('newticket') }}"
                                      class="{{ request()->is('New-Ticket') ? 'nav-link active' : 'nav-link' }}">
                                      <i class="fa fa-plus nav-icon"></i>
                                      <p>Créer un ticket</p>
                                  </a>
                              </li>

                          </ul>
                      </li>

                  </ul>
              </nav>
          @endif

          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
