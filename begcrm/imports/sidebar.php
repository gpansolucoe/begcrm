<?php
if (isset($_SESSION["id_perfil"])) {
	switch ($_SESSION["id_perfil"]) {
		case 1:
			echo '<div class="sidebar">
			<div class="main-menu">
				<div class="scroll">
					<ul class="list-unstyled">
						<li class="active">
							<a href="dashboard.php">
								<i class="simple-icon-grid"></i>
								<span>Dashboard</span>
							</a>
						</li>
						<li>
							<a href="usuarios.php">
								<i class="simple-icon-people"></i> Usuários
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>';
		break;
		case 2:
			echo '<div class="sidebar">
			<div class="main-menu">
				<div class="scroll">
					<ul class="list-unstyled">
						<li class="active">
							<a href="dashboard.php">
								<i class="simple-icon-grid"></i>
								<span>Dashboard</span>
							</a>
						</li>
						<li>
							<a href="usuarios.php">
								<i class="simple-icon-people"></i> Usuários
							</a>
						</li>
						<li>
							<a href="#parametros">
								<i class="simple-icon-equalizer"></i> Parâmetros
							</a>
						</li>
						<li>
							<a href="#atendimentos">
								<i class="simple-icon-notebook"></i>
								<span>Atendimentos</span>
							</a>
						</li>
						<li>
							<a href="#relatorios">
								<i class="simple-icon-pie-chart"></i>
								<span>Relatórios</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="sub-menu">
				<div class="scroll">
					<ul class="list-unstyled" data-link="parametros">
						<li>
							<a href="midias.php">
								<i class="iconsminds-newspaper"></i> Mídias
							</a>
						</li>
						<li>
							<a href="servicos.php">
								<i class="iconsminds-suitcase"></i>Serviços
							</a>
						</li>
						<li>
							<a href="forma-pagamento.php">
								<i class="iconsminds-coins"></i>Forma de Pagamento
							</a>
						</li>
						<li>
							<a href="motivos.php">
								<i class="iconsminds-coins"></i>Motivos de Perca
							</a>
						</li>
					</ul>
					<ul class="list-unstyled" data-link="atendimentos">
						<li>
							<a href="consultar-atendimento.php">
								<i class="iconsminds-magnifi-glass"></i>
								<span>Consultar Atendimento</span>
							</a>
						</li>
						<li>
							<a href="percas.php">
								<i class="simple-icon-tag"></i>
								<span>Percas</span>
							</a>
						</li>
						<li>
							<a href="cancelamentos.php">
								<i class="simple-icon-trash"></i>
								<span>Cancelamentos</span>
							</a>
						</li>
						<li>
							<a href="validar-atendimento.php">
								<i class="simple-icon-check"></i>
								<span>Validar Atendimento</span>
							</a>
						</li>
					</ul>
					<ul class="list-unstyled" data-link="relatorios">
						<li>
							<a href="relatorios.php">
								<i class="iconsminds-magnifi-glass"></i>
								<span>Relatorio Geral</span>
							</a>
						</li>
						<li>
							<a href="consultor-midia.php">
								<i class="iconsminds-magnifi-glass"></i>
								<span>Consultor/Midia</span>
							</a>
						</li>
						<li>
							<a href="vendas-consultor.php">
								<i class="iconsminds-magnifi-glass"></i>
								<span>Vendas Consultor</span>
							</a>
						</li>
						<li>
							<a href="relatorio-vendas-midia.php">
								<i class="iconsminds-magnifi-glass"></i>
								<span>Vendas Midia</span>
							</a>
						</li>
						<li>
							<a href="relatorio-vendas-servico.php">
								<i class="iconsminds-magnifi-glass"></i>
								<span>Vendas Serviço</span>
							</a>
						</li>
						<li>
							<a href="relatorio-quantidade-midias-entrada.php">
								<i class="iconsminds-magnifi-glass"></i>
								<span>Quantidade Entrada</span>
							</a>
						</li>
						<li>
							<a href="relatorio-quantidade-midias-perca.php">
								<i class="iconsminds-magnifi-glass"></i>
								<span>Quantidade Perca</span>
							</a>
						</li>
						<li>
							<a href="relatorio-motivos-perca.php">
								<i class="iconsminds-magnifi-glass"></i>
								<span>Motivos Perca</span>
							</a>
						</li>
						<li>
                                                        <a href="relatorio-telefone.php">
                                                                <i class="iconsminds-magnifi-glass"></i>
                                                                <span>Telefones</span>
                                                        </a>
                                                </li>

					</ul>
				</div>
			</div>

		</div>';
	        break;
		case 3:
			echo '<div class="sidebar">
			<div class="main-menu">
				<div class="scroll">
					<ul class="list-unstyled">
						<li class="active">
							<a href="dashboard.php">
								<i class="simple-icon-grid"></i>
								<span>Dashboard</span>
							</a>
						</li>
						<li>
							<a href="#atendimentos">
								<i class="simple-icon-notebook"></i>
								<span>Atendimentos</span>
							</a>
						</li>
						<li>
							<a href="pagamento-pendente-revisao.php">
								<i class="simple-icon-notebook"></i>
								<span>Pagamentos Reajuste</span>
							</a>
						</li>
						<li>
                                                        <a href="relatorio-telefone.php">
                                                                <i class="simple-icon-pie-chart"></i>
                                                                <span>Telefones</span>
                                                        </a>
                                                </li>
					</ul>
				</div>
			</div>
			<div class="sub-menu">
			<div class="scroll">
				<ul class="list-unstyled" data-link="atendimentos">
				<li>
					<a href="consultar-atendimento.php">
						<i class="iconsminds-add-user"></i>
						<span>Consultar Atendimento</span>
					</a>
					</li>
				<li>
					<a href="novo-atendimento.php">
						<i class="iconsminds-add-user"></i>
						<span>Novo Atendimento</span>
					</a>
					</li>
				<li>
					<a href="validar-atendimento.php">
						<i class="simple-icon-check"></i>
						<span>Validar Atendimento</span>
					</a>
				</li>
				</ul>
			</div>
		</div>
		</div>';
		break;
		case 4:
			if ($_SESSION["id_empresa"] != 3 && $_SESSION["id_empresa"] != 2) {
				echo '<div class="sidebar">
			<div class="main-menu">
			<div class="scroll">
				<ul class="list-unstyled">
					<li  class="active">
						<a href="dashboard.php">
							<i class="simple-icon-grid"></i>
							<span>Dashboard</span>
						</a>
					</li>
					<li>
						<a href="#atendimentos">
							<i class="simple-icon-notebook"></i>
							<span>Atendimentos</span>
						</a>
					</li>
					<li>
						<a href="agenda.php">
							<i class="simple-icon-calendar"></i>
							<span>Agenda</span>
						</a>
					</li>
                                        <li>
                                                <a href="relatorio-telefone.php">
                                                        <i class="simple-icon-pie-chart"></i>
                                                        <span>Telefones</span>
                                                </a>
                                        </li>
				</ul>
			</div>
		</div>
		<div class="sub-menu">
			<div class="scroll">
				<ul class="list-unstyled" data-link="atendimentos">
					<li>
						<a href="consultar-atendimento.php">
							<i class="iconsminds-magnifi-glass"></i>
							<span>Consultar Atendimento</span>
						</a>
					</li>
					<li>
						<a href="listar-atendimentos.php">
							<i class="simple-icon-tag"></i>
							<span>Listar Atendimentos</span>
						</a>
					</li>
					<li>
					<!--
					   <a href="novo-atendimento.php">
						<i class="iconsminds-add-user"></i>
						<span>Novo Atendimento</span>
					   </a>
					-->
					</li>
				</ul>
			</div>
		</div>
		</div>';
			} else {
				echo '<div class="sidebar">
			<div class="main-menu">
				<div class="scroll">
					<ul class="list-unstyled">
						<li  class="active">
							<a href="dashboard.php">
								<i class="simple-icon-grid"></i>
								<span>Dashboard</span>
							</a>
						</li>
						<li>
							<a href="#atendimentos">
								<i class="simple-icon-notebook"></i>
								<span>Atendimentos</span>
							</a>
						</li>
						<li>
							<a href="agenda.php">
								<i class="simple-icon-calendar"></i>
								<span>Agenda</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="sub-menu">
				<div class="scroll">
					<ul class="list-unstyled" data-link="atendimentos">
						<li>
							<a href="consultar-atendimento.php">
								<i class="iconsminds-magnifi-glass"></i>
								<span>Consultar Atendimento</span>
							</a>
						</li>
						<li>
							<a href="listar-atendimentos.php">
								<i class="iconsminds-check"></i>
								<span>Listar Atendimentos</span>
							</a>
						</li>
						<li>
					<a href="novo-atendimento.php">
						<i class="iconsminds-add-user"></i>
						<span>Novo Atendimento</span>
					</a>
					</li>
					</ul>
				</div>
			</div>
		</div>';
		}
		break;
		case 7:
			echo '<div class="sidebar">
				<div class="main-menu">
					<div class="scroll">
						<ul class="list-unstyled">
							<li class="active">
								<a href="dashboard.php">
									<i class="simple-icon-grid"></i>
									<span>Dashboard</span>
								</a>
							</li>
							<li>
								<a href="#pagamentos">
									<i class="iconsminds-dollar-sign-2"></i> Pagamentos
								</a>
							</li>
							<li>
								<a href="#relatorios">
									<i class="simple-icon-chart"></i> Relatórios
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="sub-menu">
					<div class="scroll">
						<ul class="list-unstyled" data-link="pagamentos">
							<li>
								<a href="pagamentos-sem-aprovacao.php">
									<i class="iconsminds-suitcase"></i>Sem Aprovação
								</a>
							</li>
						</ul>
						<ul class="list-unstyled" data-link="relatorios">
							<li>
								<a href="pagamentos-aprovados.php">
									<i class="simple-icon-check"></i>Pagamentos Aprovados
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>';
		break;
		case 8:
			echo '<div class="sidebar">
				<div class="main-menu">
					<div class="scroll">
						<ul class="list-unstyled">
							<li class="active">
								<a href="dashboard.php">
									<i class="simple-icon-grid"></i>
									<span>Dashboard</span>
								</a>
							</li>
							<li>
								<a href="#pagamentos">
									<i class="simple-icon-equalizer"></i> Pagamentos
								</a>
							</li>
							<li>
								<a href="#relatorios">
									<i class="simple-icon-chart"></i> Relatórios
								</a>
							</li>
                  				</ul>
					</div>
				</div>
				<div class="sub-menu">
					<div class="scroll">
						<ul class="list-unstyled" data-link="pagamentos">
							<li>
								<a href="pagamentos-sem-aprovacao.php">
									<i class="iconsminds-suitcase"></i>Sem Aprovação
								</a>
							</li>
						</ul>
						<ul class="list-unstyled" data-link="relatorios">
							<li>
								<a href="pagamentos-aprovados.php">
									<i class="simple-icon-check"></i>Pagamentos Aprovados
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>';
			break;
	}
} else {
}
