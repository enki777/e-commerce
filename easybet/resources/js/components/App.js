import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter, Route, Switch } from 'react-router-dom';
import Header from './Header';
import Index from './index/index';
import SingleMatch from './index/matches/SingleMatch';
import MatchesGameList from './index/matches/MatchesGameList';
import MatchesCategoryList from './index/matches/MatchesCategoryList';
import MatchesSearch from './index/matches/MatchesSearch';
import Dashboard from "./Admin/Dashboard";
import GameDetails from "./Admin/Game/GameDetails";
import GameCreate from "./Admin/Game/GameCreate";
import GameEdit from "./Admin/Game/GameEdit";
import CategoryCreate from "./Admin/Category/CategoryCreate";
import CategoryDetails from "./Admin/Category/CategoryDetails";
import CategoryEdit from "./Admin/Category/CategoryEdit";
import Register from './User/Auth/Register';
import Login from './User/Auth/Login';
import MatchCreate from "./Admin/Match/MatchCreate";
import MatchEdit from "./Admin/Match/MatchEdit";
import UserDetails from './User/UserDetails';


class App extends Component {
    render() {
        return (
            <BrowserRouter>
                <div>
                    <Header />
                    <Switch>
                        <Route exact path='/' component={Index} />
                        <Route exact path='/matches/:id' component={SingleMatch} />
                        <Route exact path='/matches/game/:id' component={MatchesGameList} />
                        <Route exact path='/matches/category/:id' component={MatchesCategoryList} />
                        <Route exact path='/matches/search/:name' component={MatchesSearch} />
                        <Route exact path='/register' component={Register} />
                        <Route exact path='/login' component={Login} />
                        <Route exact path='/admin' component={Dashboard} />
                        <Route exact path='/admin/game/create' component={GameCreate} />
                        <Route exact path='/admin/game/:id/' component={GameDetails} />
                        <Route exact path='/admin/game/edit/:id/' component={GameEdit} />
                        <Route exact path='/admin/category/create/' component={CategoryCreate} />
                        <Route exact path='/admin/category/:id' component={CategoryDetails} />
                        <Route exact path='/admin/category/edit/:id' component={CategoryEdit} />
                        <Route exact path='/admin/match/create' component={MatchCreate} />
                        <Route exact path='/admin/match/edit/:match' component={MatchEdit} />
                        <Route exact path='/admin/user/:id' component={UserDetails} />
                    </Switch>
                </div>
            </BrowserRouter>
        )
    }
}

ReactDOM.render(<App />, document.getElementById('app'))
