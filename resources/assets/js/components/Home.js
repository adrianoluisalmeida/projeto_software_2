import React, {Component} from 'react';
import ReactDOM from 'react-dom';

export default class Home extends Component {
    render() {
        return (
            <div>
                <Banner/>

            </div>
        );
    }
}

class Banner extends React.Component{
    render() {
        return (
            <section className="intro_section page_mainslider ds all-scr-cover">
                <div className="flexslider vertical-nav" data-dots="true" data-nav="false">
                    <ul className="slides">
                        <li>
                            <div class="over-shadow"></div>
                            <div className="slide-image-wrap">
                                <img src="/img/home/2.jpg" alt=""/>
                            </div>

                            <div className="slide-image-wrap hidden-xs hidden-sm to_animate" data-animation="fadeInRight">

                            </div>

                            <div className="container">
                                <div className="row">
                                    <div className="col-sm-12">
                                        <div className="slide_description_wrapper">
                                            <div className="slide_description">
                                                <div className="intro-layer" data-animation="fadeInLeft">
                                                    <h2>
                                                        Com a nossa <b>cidade unida</b>, somos mais fortes!
                                                    </h2>
                                                    <hr className="theme-divider big color2"/>
                                                </div>
                                                <div className="intro-layer" data-animation="fadeInLeft">
                                                    <p>Contribua para a melhoria da sua cidade.</p>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </li>
                        <li>
                            <div class="over-shadow"></div>
                            <div className="slide-image-wrap">
                                <img src="/img/home/1.jpg" alt=""/>
                            </div>
                            <div className="slide-image-wrap hidden-xs hidden-sm to_animate" data-animation="fadeInRight">

                            </div>
                            <div className="container">
                                <div className="row">
                                    <div className="col-sm-12">
                                        <div className="slide_description_wrapper">
                                            <div className="slide_description">
                                                <div className="intro-layer" data-animation="fadeInLeft">
                                                    <h2>
                                                        Cidade Unida
                                                    </h2>

                                                    <hr className="theme-divider big color2"/>
                                                </div>
                                                <div className="intro-layer" data-animation="fadeInLeft">
                                                    <p>Exerça sua cidadania e colabore postando e apoiando ocorrências.</p>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </li>

                    </ul>
                </div>
            </section>

        );
    }
}

// if (document.getElementById('banner')) {
//     ReactDOM.render(<Banner/>, document.getElementById('banner'));
// }

if (document.getElementById('home')) {
    ReactDOM.render(<Home/>, document.getElementById('home'));
}
