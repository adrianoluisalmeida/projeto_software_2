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
                                    <li><a href="/sobre-nos">Sobre nós</a></li>
                                    <li><a href="/testes">Testes</a></li>
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