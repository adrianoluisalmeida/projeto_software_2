import React, {Component} from 'react';
import ReactDOM from 'react-dom';

export default class Test extends Component {
    render() {
        return (
            <div>
                <section
                    className="page_breadcrumbs ds background_cover overlay_color section_padding_top_75 section_padding_bottom_65">
                    <div className="container">

                        <div className="col-sm-12 text-center display_table_md breadcrumb center-block-fixed">
                            <h2 className="small display_table_cell_md">Testes</h2>
                            <ol className="breadcrumb display_table_cell_md">
                                <li>
                                    <a href="/">Home</a>
                                </li>
                                <li className="active">Teste</li>
                            </ol>
                        </div>
                    </div>
                </section>

                <section className="ls section_padding_top_140 columns_margin_bottom_30">
                    <div className="container">
                        <div className="row">
                            <div className="col-md-12 to_animate" data-animation="fadeInRight"
                                 data-delay="600">
                                <h2 className="section_header">
                                    <span className="thin"></span> Download
                                </h2>
                                <hr className="theme-divider color1"/>
                                <p>
                                    Como se trata de um primeiro teste, a APK está disponível em:

                                </p>
                                <h2 className="section_header">
                                    Cronograma de testes do MVP
                                </h2>
                                <hr className="theme-divider color1"/>
                                <p>
                                    Para testar o Admin e o Aplicativo, estamos disponíbilizando uma lista para
                                    facilitar a compreensão da proposta do trabalho.
                                    <br/><br/>
                                    <b>Acesso de testes do sistema Administrativo:</b> <br/>
                                    <b>endereço</b>: <a href="http://cidadeunida.pipelinelab.com.br/admin"
                                                        target="_blank">http://cidadeunida.pipelinelab.com.br/admin</a>
                                    <br/>
                                    <b>usuario</b>: <br/>
                                    <b>senha</b>:<br/>
                                </p>

                                <h3 className="section_header">
                                    Teste 1 <small>Criar conta</small>
                                </h3>
                                <p> A partir do botão criar conta na tela de login</p>

                                <h3 className="section_header">
                                    Teste 2 <small>Fazer login com a conta recém criada </small>
                                </h3>
                                <p> Aguarde ele recuperar a localização se disponível, caso contrário selecionar qual a cidade

                                </p>

                                <h3 className="section_header">
                                    Teste 3 <small>Relatar um problema </small>
                                </h3>
                                <p>
                                    Pressionar o botão relatar problema da tela inicial ou na parte inferior da lista de relatos,
                                    selecionar a categoria e preencher o formulário, é possível tirar uma foto ou selecionar uma foto da galeria
                                </p>

                                <h3 className="section_header">
                                    Teste 4 <small>Exibir um relato</small>
                                </h3>
                                <p> Selecione um relato da lista de relatos, o app irá as informações sobre o relato,
                                    bem como foto, e atualizações sobre o mesmo, caso seja um relato de outro usuário é
                                    possível reagir (apoiar ou denunciar o relato).
                                </p>

                                <h3 className="section_header">
                                    Teste 5 <small>Reagir a um relato feito por outro usuário</small>
                                </h3>
                                <p>
                                    Exibir um relato da aba todos e utilizar uma das opções (apoiar ou denunciar)
                                </p>

                                <h3 className="section_header">
                                    Teste 6  <small>Atualizar dados do usuário (nome ou senha)</small>
                                </h3>
                                <p>
                                    Clicar no botão de configurações no menu lateral e preencher o formulário
                                </p>


                                <h2 className="section_header">
                                    <span className="thin">Mais</span> Informações
                                </h2>
                                <hr className="theme-divider color1"/>
                                <p>
                                    Adriano Almeida <a
                                    href="mailto:alalmeida@inf.ufsm.br">alalmeida@inf.ufsm.br</a><br/>
                                    Roger Couto <a href="mailto:recouto@inf.ufsm.br">recouto@inf.ufsm.br</a><br/>


                                </p>
                            </div>

                            <div className="col-md-6 col-md-pull-6 text-center text-md-left bottommargin_0 to_animate"
                                 data-animation="fadeInUp" data-delay="300">

                            </div>
                        </div>
                    </div>
                </section>
            </div>

        )
    }
}

if (document.getElementById('test')) {
    ReactDOM.render(<Test/>, document.getElementById('test'))
}
