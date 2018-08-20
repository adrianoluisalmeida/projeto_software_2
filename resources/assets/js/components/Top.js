import React, {Component} from 'react';
import ReactDOM from 'react-dom';

export default class Top extends Component {
    render() {
        return (
            <div className="container">
                <div className="row">
                    <div className="col-md-4 col-sm-12 col-md-push-4 text-center">
                        <a href="./" className="logo logo_with_text vertical_logo">
                        <img src="https://via.placeholder.com/129x83" alt=""/>
                        </a>
                   <span className="toggle_menu">
                       <span></span>
                   </span>
                    </div>
                    <div className="col-md-4 col-sm-6 col-md-pull-4 text-center text-md-left">
                        <div className="page-social darklinks">
                            <a className="social-icon socicon-facebook" href="#" title="Facebook"></a>
                            <a className="social-icon socicon-twitter" href="#" title="Twitter"></a>
                            <a className="social-icon socicon-google" href="#" title="Twitter"></a>
                            <a className="social-icon socicon-linkedin" href="#" title="Twitter"></a>
                            <a className="social-icon socicon-youtube" href="#" title="Youtube"></a>
                        </div>
                    </div>
                    <div className="col-md-4 col-sm-6 text-center text-md-right">
                        <a href="contact.html" className="theme_button color1 two_lines_button">Solicite um orçamento</a>
                    </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('top')) {
    ReactDOM.render(<Top/>, document.getElementById('top'));
}
