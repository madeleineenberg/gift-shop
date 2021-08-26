import React, { useState } from 'react';
import './App.css';
import StartPage from './pages/StartPage';
import { Switch, BrowserRouter as Router, Route } from 'react-router-dom';
import { spring, AnimatedSwitch } from 'react-router-transition';
import AgePage from './pages/AgePage';
import { PersonContext } from './contexts/PersonContext';
import InterestPage from './pages/InterestPage';
import RelationshipPage from './pages/RelationshipPage';
import ResultPage from './pages/ResultPage';

function App() {
  const [personList, setPersonList] = useState('');
  const [correctStarted, setCorrectStarted] = useState(false);

  // we need to map the `scale` prop we define below
  // to the transform style property
  function mapStyles(styles) {
    return {
      opacity: styles.opacity,
      transform: `scale(${styles.scale})`,
    };
  }

  // wrap the `spring` helper to use a bouncy config
  function bounce(val) {
    return spring(val, {
      stiffness: 330,
      damping: 22,
    });
  }

  // child matches will...
  const bounceTransition = {
    // start in a transparent, upscaled state
    atEnter: {
      opacity: 0,
      scale: 1.2,
    },
    // leave in a transparent, downscaled state
    atLeave: {
      opacity: bounce(0),
      scale: bounce(0.8),
    },
    // and rest at an opaque, normally-scaled state
    atActive: {
      opacity: bounce(1),
      scale: bounce(1),
    },
  };

  return (
    <div className='app-wrapper'>
      <h1 className='app-title'>Holiday Present Generator</h1>

      <PersonContext.Provider
        value={{ personList, setPersonList, correctStarted, setCorrectStarted }}
      >
        <Router>
          <AnimatedSwitch
            atEnter={bounceTransition.atEnter}
            atLeave={bounceTransition.atLeave}
            atActive={bounceTransition.atActive}
            mapStyles={mapStyles}
            className='route-wrapper'
          >
            <Route exact path='/' component={StartPage} />
            <Route path='/age' component={AgePage} />
            <Route path='/interest' component={InterestPage} />
            <Route path='/relations' component={RelationshipPage} />
            <Route path='/result' component={ResultPage} />
          </AnimatedSwitch>
        </Router>
      </PersonContext.Provider>
    </div>
  );
}

export default App;
