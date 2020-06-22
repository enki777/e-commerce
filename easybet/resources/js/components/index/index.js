import axios from 'axios'
import React, { Component, forwardRef } from 'react'
import { Link } from 'react-router-dom'
import { Route } from 'react-router-dom/cjs/react-router-dom.min'
import CategoriesList from './categories/CategoriesList'
import GamesList from './games/GamesList'
import CurrentMatches from './matches/CurrentMatches'
import UpcomingMatches from './matches/UpcomingMatches'
import FinishedMatches from './matches/FinishedMatches'
import MatchesSearch from './matches/MatchesSearch'
import MostBets from './bets/MostBets'


class Index extends Component {
    constructor() {
        super()
        this.state = {
            pagination: [],
        }
    }

    upcomingMatches() {
        console.log("salut")
        e.preventDefault();
        // $('#currentMatchesLink').css('border','none');
        $('#currentMatchesLink').css('borderStyle: none');
        // $('#test').append(<UpcomingMatches />);
    }

    componentDidMount() {
        const pagination = this.props.match.params.id
        axios.get('/api/matches/').then(response => {
            console.log(response.data)
            this.setState({
                //    pagination: response.data[0]
            })
        })
    }

    render() {
        const { pagination } = this.state
        return (
            <div className='container-fluid'>
                <div className='row justify-content-center'>
                    <div className="col-2 mt-5">
                        <div className="accordion" id="accordionExample">
                            <GamesList />
                            <CategoriesList />
                        </div>
                        <br />
                        {/* <MostBets /> */}
                    </div>
                    <div className='col-8 mt-5'>
                        <div className="card text-center bg-dark border-0">
                            <div className="card-header ">
                                <ul className="nav nav-tabs card-header-tabs">
                                    <li className="nav-item">
                                        <a id="currentMatchesLink" className="nav-link active  bg-dark border-success text-success border-bottom-0" href="">Current Matches</a>
                                    </li>
                                    <li className="nav-item">
                                        <form onSubmit={this.upcomingMatches}>
                                            <button type="submit" className="nav-link bg-dark text-light border-dark">Upcoming Matches</button>
                                            {/* <input type="submit" value="Envoyer" /> */}
                                        </form>
                                    </li>
                                    <li className="nav-item">
                                        <a className="nav-link  bg-dark border-dark text-light border-bottom-0 border-left-0" href="#" tabIndex="-1" aria-disabled="true">Finished Matches</a>
                                    </li>
                                </ul>
                            </div>
                            <div className="card-body p-0" id="test">
                                <CurrentMatches />
                                {/* <UpcomingMatches /> */}
                            </div>
                        </div>
                    </div>
                    <div className="col-2">
                        <MatchesSearch />
                    </div>
                </div>
            </div>
        )
    }
}

export default Index
