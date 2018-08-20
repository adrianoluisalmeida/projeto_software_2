import React, {Component} from 'react';
import ReactDOM from 'react-dom';

export default class Menu extends Component {
    render(){
        return (

                <div className="container">
                    <div className="row">
                        <div className="col-sm-12 text-center">

                            <nav className="mainmenu_wrapper">
                                <ul className="mainmenu nav sf-menu">
                                    <li className="active">
                                        <a href="/">Home</a>
                                    </li>
                                    <li><a href="/a-triunfo">A Triunfo</a></li>
                                    <li><a href="/servicos-florestais">Serviços Florestais</a></li>
                                    <li><a href="/imoveis-rurais">Imóveis Rurais</a></li>
                                    <li><a href="/orcamento">Orçamento</a></li>
                                    <li><a href="/fale-conosco">Fale Conosco</a></li>
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
        );
    }
}

if(document.getElementById('menu')){
    ReactDOM.render(<Menu/>, document.getElementById('menu'));
}