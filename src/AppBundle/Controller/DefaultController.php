<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Quiz;
use AppBundle\Entity\Users;
use AppBundle\Entity\Questions;
use AppBundle\Entity\Answers;
use AppBundle\Entity\Codes;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $session = $request->getSession();
        if($session->get('username')=='')
        {
            $login = 'SignUp';
            $loginText = 'or SignIn';
            return $this->render('Main/MainPage.html.twig',array('login'=>$login,'loginText'=>$loginText));
        }
        else
        {
            $login = 'SignOut';
            $loginText = 'you are logged in as ' . $session->get('username');
            if($session->get('role')=='true')
            {
                return $this->render('Main/AdminMainPage.html.twig',array('login'=>$login,'loginText'=>$loginText));
            }
            else
            {
                return $this->render('Main/MainPage.html.twig',array('login'=>$login,'loginText'=>$loginText));
            }
        }
    }

    /**
     * @Route("/AdminMainPage", name="AdminMainPage")
     */
    public function AdminMainPageAction(Request $request)
    {
        $session = $request->getSession();
        if($session->get('role')=='true')
        {
                $login = 'SignOut';
                $loginText = 'you are logged in as '.$session->get('username');
            return $this->render('Main/AdminMainPage.html.twig',array('login'=>$login,'loginText'=>$loginText));
        }
        else
        {
            return $this->redirectToRoute('homepage');
        }
    }

    /**
     * @Route("/Rules", name="Rules")
     */
    public function RulesAction(Request $request)
    {
        $session = $request->getSession();
        if($session->get('username')=='')
        {
            $login = 'SignUp';
            $loginText = 'or SignIn';
            return $this->render('Rules/Rules.html.twig',array('login'=>$login,'loginText'=>$loginText));
        }
        else
        {
            $login = 'SignOut';
            $loginText = 'you are logged in as ' . $session->get('username');
            if($session->get('role')=='true')
            {
                $mainPage="AdminMainPage";
                return $this->render('Rules/Rules.html.twig',array('login'=>$login,'loginText'=>$loginText,'mainPage'=>$mainPage));
            }
            else
            {
                $mainPage="";
                return $this->render('Rules/Rules.html.twig',array('login'=>$login,'loginText'=>$loginText,'mainPage'=>$mainPage));
            }
        }
    }

    /**
     * @Route("/Ratings", name="Ratings")
     */
    public function RatingsAction(Request $request)
    {
        $session = $request->getSession();
        if($session->get('username')=='')
        {
            $login = 'SignUp';
            $loginText = 'or SignIn';
            return $this->render('Ratings/Ratings.html.twig',array('login'=>$login,'loginText'=>$loginText));
        }
        else
        {
            $login = 'SignOut';
            $loginText = 'you are logged in as ' . $session->get('username');
            if($session->get('role')=='true')
            {
                $mainPage="AdminMainPage";
                return $this->render('Ratings/Ratings.html.twig',array('login'=>$login,'loginText'=>$loginText,'mainPage'=>$mainPage));
            }
            else
            {
                $mainPage="";
                return $this->render('Ratings/Ratings.html.twig',array('login'=>$login,'loginText'=>$loginText,'mainPage'=>$mainPage));
            }
        }
    }

    /**
     * @Route("/Contacts", name="Contacts")
     */
    public function ContactsAction(Request $request)
    {
        $session = $request->getSession();
        if($session->get('username')=='')
        {
            $login = 'SignUp';
            $loginText = 'or SignIn';
            return $this->render('Contacts/Contacts.html.twig',array('login'=>$login,'loginText'=>$loginText));
        }
        else
        {
            $login = 'SignOut';
            $loginText = 'you are logged in as ' . $session->get('username');
            if($session->get('role')=='true')
            {
                $mainPage="AdminMainPage";
                return $this->render('Contacts/Contacts.html.twig',array('login'=>$login,'loginText'=>$loginText,'mainPage'=>$mainPage));
            }
            else
            {
                $mainPage="";
                return $this->render('Contacts/Contacts.html.twig',array('login'=>$login,'loginText'=>$loginText,'mainPage'=>$mainPage));
            }
        }
    }

    /**
     * @Route("/QuestionCreate", name="QuestionCreate")
     */
    public function QuestionCreateAction(Request $request)
    {
        $session = $request->getSession();
        if($session->get('role')=='true')
        {
            $login = 'SignOut';
            $loginText = 'you are logged in as '.$session->get('username');



            $post=Request::createFromGlobals();
            if($post->request->has('submit'))
            {
                if ($post->request->get('Question')!='' && $post->request->get('Answer1')!='' && $post->request->get('Answer2')!='' && $post->request->get('Answer3')!='' && $post->request->get('Answer4')!='' && $post->request->get('Correct')!='')
                {
                    $question = $post->request->get('Question');
                    $answer1 = $post->request->get('Answer1');
                    $answer2 = $post->request->get('Answer2');
                    $answer3 = $post->request->get('Answer3');
                    $answer4 = $post->request->get('Answer4');
                    $correctAnswer = $post->request->get('Correct');

                    $Question = new Questions();
                    $Answer1 = new Answers();
                    $Answer2 = new Answers();
                    $Answer3 = new Answers();
                    $Answer4 = new Answers();

                    $Question->setQuestion($question);

                    $Answer1->setAnswer($answer1);
                    $Answer2->setAnswer($answer2);
                    $Answer3->setAnswer($answer3);
                    $Answer4->setAnswer($answer4);

                    switch($correctAnswer){
                        case 1:
                            $Answer1->setRightAns('true');
                            $Answer2->setRightAns('false');
                            $Answer3->setRightAns('false');
                            $Answer4->setRightAns('false');
                            break;
                        case 2:
                            $Answer1->setRightAns('false');
                            $Answer2->setRightAns('true');
                            $Answer3->setRightAns('false');
                            $Answer4->setRightAns('false');
                            break;
                        case 3:
                            $Answer1->setRightAns('false');
                            $Answer2->setRightAns('false');
                            $Answer3->setRightAns('true');
                            $Answer4->setRightAns('false');
                            break;
                        case 4:
                            $Answer1->setRightAns('false');
                            $Answer2->setRightAns('false');
                            $Answer3->setRightAns('false');
                            $Answer4->setRightAns('true');
                            break;
                    }

                    $em = $this->getDoctrine()->getManager();

                    $em->persist($Question);
                    $em->flush();

                    $em->persist($Answer1);
                    $em->flush();
                    $em->persist($Answer2);
                    $em->flush();
                    $em->persist($Answer3);
                    $em->flush();
                    $em->persist($Answer4);
                    $em->flush();

                    $Codes1 = new Codes();
                    $Codes1->setQuestionId($Question->getId());
                    $Codes1->setAnswerId($Answer1->getAnswerId());

                    $Codes2 = new Codes();
                    $Codes2->setQuestionId($Question->getId());
                    $Codes2->setAnswerId($Answer2->getAnswerId());

                    $Codes3 = new Codes();
                    $Codes3->setQuestionId($Question->getId());
                    $Codes3->setAnswerId($Answer3->getAnswerId());

                    $Codes4 = new Codes();
                    $Codes4->setQuestionId($Question->getId());
                    $Codes4->setAnswerId($Answer4->getAnswerId());

                    $em->persist($Codes1);
                    $em->flush();
                    $em->persist($Codes2);
                    $em->flush();
                    $em->persist($Codes3);
                    $em->flush();
                    $em->persist($Codes4);
                    $em->flush();

                    return $this->redirectToRoute('QuestionCreate');
                }
            }



        return $this->render('QuestionCreate/QuestionCreate.html.twig',array('login'=>$login,'loginText'=>$loginText));
        }
        else
        {
            return $this->redirectToRoute('homepage');
        }
    }

    /**
     * @Route("/QuizCreate", name="QuizCreate")
     */
    public function QuizCreateAction(Request $request)
    {
        $session = $request->getSession();
        if($session->get('role')=='true')
        {
            $login = 'SignOut';
            $loginText = 'you are logged in as '.$session->get('username');

            $em = $this->getDoctrine()->getManager();
            $repository = $em->getRepository(Questions::class);

            $RecordsNumber = $repository->findAll();
            $i=0;
            $questionInArray = array();
            foreach($RecordsNumber as $a)
            {
                $questionInArray[$i] = $a->getId().')'.$a->getQuestion();
                $i++;
            }
            $i--;

            $post=Request::createFromGlobals();
            if($post->request->has('submit'))
            {
                if ($post->request->get('Question_1')!='' && $post->request->get('Question_2')!='' && $post->request->get('Question_2')!='' && $post->request->get('Question_3')!='' && $post->request->get('Question_4')!='' && $post->request->get('Question_5')!='' && $post->request->get('Question_6')!='' && $post->request->get('Question_7')!='' && $post->request->get('Question_8')!='' && $post->request->get('Question_9')!='' && $post->request->get('Question_10')!='')
                {
                    $question_1 = $post->request->get('Question_1');
                    $question_2 = $post->request->get('Question_2');
                    $question_3 = $post->request->get('Question_3');
                    $question_4 = $post->request->get('Question_4');
                    $question_5 = $post->request->get('Question_5');
                    $question_6 = $post->request->get('Question_6');
                    $question_7 = $post->request->get('Question_7');
                    $question_8 = $post->request->get('Question_8');
                    $question_9 = $post->request->get('Question_9');
                    $question_10 = $post->request->get('Question_10');
                    $quiz = $post->request->get('Quiz');

                    $Quiz = new Quiz();

                    $Quiz->setQuiz($quiz);
                    $Quiz->setQuestion1($question_1);
                    $Quiz->setQuestion2($question_2);
                    $Quiz->setQuestion3($question_3);
                    $Quiz->setQuestion4($question_4);
                    $Quiz->setQuestion5($question_5);
                    $Quiz->setQuestion6($question_6);
                    $Quiz->setQuestion7($question_7);
                    $Quiz->setQuestion8($question_8);
                    $Quiz->setQuestion9($question_9);
                    $Quiz->setQuestion10($question_10);

                    $em->persist($Quiz);
                    $em->flush();

                    return $this->redirectToRoute('AdminMainPage');
                }
                else {echo 'enter something!';}
            }

            return $this->render('QuizCreate/QuizCreate.html.twig',array('login'=>$login,'loginText'=>$loginText,'numberOfQuestions'=>$i,'questionInArray'=>$questionInArray));
        }
        else
        {
            return $this->redirectToRoute('homepage');
        }
    }

    /**
     * @Route("/SignUp", name="SignUp")
     */
    public function SignUpAction(Request $request)
    {
        $post=Request::createFromGlobals();

        if ($post->request->has('submit'))
        {
            if ($post->request->get('UserName')!='' && $post->request->get('Email')!='' && $post->request->get('Password')!='' && $post->request->get('Password2')!='')
            {
            $username = $post->request->get('UserName');
            $email = $post->request->get('Email');
            $password = $post->request->get('Password');
            $password2 = $post->request->get('Password2');

            if ($password == $password2)
            {
                $user = new Users();

                $user->setUserName($username);
                $user->setEmail($email);
                $encoded = $this->encodePassword($password);
                $user->setPassword($encoded);
                $user->setRole('false');

                $em = $this->getDoctrine()->getManager();
                $repository = $em->getRepository(Users::class);
                $check1 = $repository->findOneBy(array('user_name'=>$username));
                $check2 = $repository->findOneBy(array('email'=>$email));

                if (!$check1 && !$check2)
                {
                    $em->persist($user);
                    $em->flush();
                    return $this->redirectToRoute('SignIn');
                }
                echo 'Such user is already registered!';
                return $this->render('Form/SignUp.html.twig');
            }
            echo 'check your password!';
            } else
            {
                echo 'Please, enter something!';
            }
        }

        return $this->render('Form/SignUp.html.twig');
    }

    /**
     * @Route("/SignIn", name="SignIn")
     */
    public function SignInAction(Request $request)
    {
        $post=Request::createFromGlobals();

        if($post->request->has('submit'))
        {
            $username = $post->request->get('UserName');
            $password = $post->request->get('Password');

            $user = new Users();
            $user->setUserName($username);

            $encoded=$this->encodePassword($password);
            $user->setPassword($encoded);

            $em = $this->getDoctrine()->getManager();
            $repository = $em->getRepository(Users::class);

            $check = $repository->findOneBy(array('user_name' => $username, 'password' => $encoded));

            if ($check)
            {
                $session = $request->getSession();
                $session->set('username',$username);
                $session->set('role',$check->getRole());
                if($session->get('role')=='true')
                {
                    return $this->redirectToRoute('AdminMainPage');
                }
                else
                {
                    return $this->redirectToRoute('homepage');
                }
            } else
            {
                echo "wrong login or password!";
            }
        }
            return $this->render('Form/SignIn.html.twig');
    }

    /**
     * @Route("/SignOut", name="SignOut")
     */
    public function SignOutAction(Request $request)
    {
        $session = $request->getSession();
        $session->set('username','');
        $session->set('role','');
        return $this->redirectToRoute('homepage');
    }

    /**
     * @Route("/Start", name="Start")
     */
    public function StartAction(Request $request)
    {
        $session = $request->getSession();
        if($session->get('username')=='')
        {
            return $this->redirectToRoute('SignIn');

        }
        else
        {
            $login = 'SignOut';
            $loginText = 'you are logged in as ' . $session->get('username');

            $em = $this->getDoctrine()->getManager();
            $repository = $em->getRepository(Quiz::class);

            $RecordsNumber = $repository->findAll();
            $i=0;
            $quizInArray = array();
            foreach($RecordsNumber as $a)
            {
                $quizInArray[$i] = $a->getId().')'.$a->getQuiz();
                $i++;
            }
            $i--;

            if($session->get('role')=='true')
            {
                $mainPage="AdminMainPage";
            }
            else
            {
                $mainPage="";
            }


            $post=Request::createFromGlobals();
            if($post->request->has('submit'))
            {
                $quizNumber = $post->request->get('QuizNumber');
                if ($quizNumber >= $RecordsNumber[0]->getId() && $quizNumber <= $RecordsNumber[$i]->getId()){
                    $session->set('quizNumber',$quizNumber);
                    $session->set('currentNumber',0);
                    $session->set('nextNumber',1);
                    $session->set('RightAnswers',0);
                    return $this->redirectToRoute('Game');
                }

                return $this->redirectToRoute('Start');
            }
            else
            {
                return $this->render('Start/Start.html.twig', array('login' => $login, 'loginText' => $loginText, 'mainPage' => $mainPage,'numberOfQuiz'=>$i,'quizInArray'=>$quizInArray));
            }
        }
    }

    /**
     * @Route("/Game", name="Game")
     */
    public function GameAction(Request $request)
    {
        $session = $request->getSession();
        $session->set('message','');
        if($session->get('username')=='')
        {
            return $this->redirectToRoute('SignIn');
        }
        else
        {
            $login = 'SignOut';
            $loginText = 'you are logged in as ' . $session->get('username');
            if($session->get('role')=='true')
            {
                $mainPage="AdminMainPage";
            }
            else
            {
                $mainPage="";
            }
        }

        $number = $session->get('quizNumber');
        $em = $this->getDoctrine()->getManager();
        $QuizRepository = $em->getRepository(Quiz::class);
        $forIdQuiz = $QuizRepository->findOneBy(array('id'=>$number));
        $QuestionsArray = array($forIdQuiz->getQuestion1(), $forIdQuiz->getQuestion2(), $forIdQuiz->getQuestion3(), $forIdQuiz->getQuestion4(), $forIdQuiz->getQuestion5(), $forIdQuiz->getQuestion6(), $forIdQuiz->getQuestion7(), $forIdQuiz->getQuestion8(), $forIdQuiz->getQuestion9(), $forIdQuiz->getQuestion10());

        $post=Request::createFromGlobals();
        $answerNumber =  $post->request->get('AnswerNumber');

        if($post->request->has('submit') )
        {
            if($answerNumber<5 && $answerNumber>0)
            {
                $AnswersRep = $em->getRepository(Answers::class);
                $QuestionRep = $em->getRepository(Questions::class);
                $Question = $QuestionRep->findOneBy(array('id'=>$QuestionsArray[$session->get('currentNumber')]));
                $Answer = $AnswersRep->findOneBy(array('id'=>($Question->getId()*4-(4-$answerNumber))));

                $session->set('currentNumber',($session->get('nextNumber')));
                $session->set('nextNumber',$session->get('currentNumber')+1);


                if($Answer->getRightAns()=='true')
                {
                    $session->set('RightAnswers',$session->get('RightAnswers')+1);
                    echo $session->get('RightAnswers');
                }

                if (($session->get('nextNumber'))==11)
                {
                    echo $session->get('RightAnswers').'/10';
                    return $this->redirectToRoute('Ratings');
                }
            }else{
                $session->set('message','Please, enter something between 1 and 4...');
            }
        }


            $QuestionRepository = $em->getRepository(Questions::class);
            $CurrentQuestion = $QuestionRepository->findOneBy(array('id'=>$QuestionsArray[$session->get('currentNumber')]));

            $CodesRepository = $em->getRepository(Codes::class);
            $PresentCode = $CodesRepository->findBy(array('question_id'=>$QuestionsArray[$session->get('currentNumber')]));
            $GameAnswersIdArray = array($PresentCode[0]->getAnswerId(),$PresentCode[1]->getAnswerId(),$PresentCode[2]->getAnswerId(),$PresentCode[3]->getAnswerId());

            $AnswersRepository = $em->getRepository(Answers::class);
            $CurrentAnswersArray = array();
            $l=0;
            foreach ($GameAnswersIdArray as $item)
            {
                $CurrentAnswer = $AnswersRepository->findOneBy(array('id'=>$item));
                $CurrentAnswersArray[$l] = $CurrentAnswer->getAnswer();
                $l++;
            }


            return $this->render('Start/Game.html.twig',array('login'=>$login,'loginText'=>$loginText,'mainPage'=>$mainPage,'CurrentQuestion'=>$CurrentQuestion->getQuestion(),'CurrentAnswersArray'=>$CurrentAnswersArray,'message'=>$session->get('message')));

        }

    public function encodePassword($pass)
    {
        return hash('sha256', $pass);
    }

}
