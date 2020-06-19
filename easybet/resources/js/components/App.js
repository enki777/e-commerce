import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import { BrowserRouter, Route, Switch } from 'react-router-dom'
import Header from './Header'
import Index from './index/index'
import SingleMatch from './index/matches/SingleMatch'
import MatchesGameList from './index/matches/MatchesGameList'
import MatchesCategoryList from './index/matches/MatchesCategoryList'
import MatchesSearch from './index/matches/MatchesSearch'

class App extends Component {
    render() {
        return (
            <BrowserRouter>
                <div>
                    <Header />
                    <Switch>
                        <Route exact path='/' component={Index} />
                        <Route exact path='/:id' component={SingleMatch} />
                        <Route exact path='/matches/game/:id' component={MatchesGameList} />
                        <Route exact path='/matches/category/:id' component={MatchesCategoryList} />
                        <Route exact path='/matches/search/:name' component={MatchesSearch} />
                    </Switch>
                </div>
            </BrowserRouter>
        )
    }
}

ReactDOM.render(<App />, document.getElementById('app'))