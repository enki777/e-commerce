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
        e.preventDefault();
        $('#currentMatchesLink').css('borderStyle: none');
    }

    componentDidMount() {
        const pagination = this.props.match.params.id
        axios.get('/api/matches/').then(response => {
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
                    </div>
                    <div className='col-8 mt-5'>
                        <div className="card text-center bg-dark border-0">
                            <div className="card-header ">
                                <ul className="nav nav-tabs card-header-tabs">
                                    <li className="nav-item">
                                        <a id="currentMatchesLink" className="nav-link active  bg-dark border-success text-success border-bottom-0" href="/"><span className="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Current Matches</a>
                                    </li>
                                    <li className="nav-item">
                                        <a href='/matches/upcoming'>
                                            <button className="nav-link bg-dark text-light border-dark">Upcoming Matches</button>
                                        </a>
                                    </li>
                                    <li className="nav-item">
                                        <a className="nav-link bg-dark border-dark text-light border-bottom-0 border-left-0" href="/matches/finished" tabIndex="-1" aria-disabled="true">Finished Matches</a>
                                    </li>
                                </ul>
                            </div>
                            <div className="card-body p-0">
                                <CurrentMatches />
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
