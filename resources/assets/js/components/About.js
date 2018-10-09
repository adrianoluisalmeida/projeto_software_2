import React, {Component} from 'react';
import ReactDOM from 'react-dom';

export default class About extends Component {
    render() {
        return (
            <div>
                <section
                    className="page_breadcrumbs ds background_cover overlay_color section_padding_top_75 section_padding_bottom_65">
                    <div className="container">

                        <div className="col-sm-12 text-center display_table_md breadcrumb center-block-fixed">
                            <h2 className="small display_table_cell_md">Quem Somos</h2>
                            <ol className="breadcrumb display_table_cell_md">
                                <li>
                                    <a href="/">Home</a>
                                </li>
                                <li className="active">Quem somos</li>
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
                                    <span className="thin">O</span> Problema
                                </h2>
                                <hr className="theme-divider color1"/>
                                <p>
                                    Buracos, vazamentos, lixão irregular, são apenas alguns dos problemas diários
                                    encontrados nas grandes cidades.
                                    Com o crescimento contínuo e acelerado das cidades brasileiras, identificar todos os
                                    problemas diariamente,
                                    pode ser um grande desafio para as prefeituras e órgãos públicos. Por outro lado,
                                    quem diariamente desloca-se e se
                                    depara com problemas como: estacionamento irregular, problemas de pavimentação,
                                    falta de água e luz, é a população.
                                    A população acabam enfrentando dificuldades de ter voz ativa para relatar esses e
                                    outros problemas em suas cidades.
                                </p>
                                <h2 className="section_header">
                                    <span className="thin">Nossa</span> Solução
                                </h2>
                                <hr className="theme-divider color1"/>
                                <p>
                                    Pensando em esclarecer e facilitar comunicação entre os órgãos públicos e a
                                    população, o presente trabalho
                                    apresenta uma solução de Software para gestão de ocorrências de ordem pública. Como
                                    resultado,
                                    busca-se desenvolver um aplicativo que qualquer cidadão possa denunciar um problema
                                    público na sua cidade.
                                    Esses problemas serão reportados e vistos pelas demais pessoas do aplicativo e além
                                    disso a prefeitura também
                                    receberá essas “denúncias”. Através da categoria selecionada no ato do registro da
                                    denúncia, ela pode ser
                                    encaminhada diretamente para o setor responsável por esse problema. Dessa forma
                                    contribuindo para a identificação
                                    de problemas diários mais rapidamente e assim facilitando a aplicação de medidas de
                                    correção ao problema.

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

if (document.getElementById('about')) {
    ReactDOM.render(<About/>, document.getElementById('about'))
}
