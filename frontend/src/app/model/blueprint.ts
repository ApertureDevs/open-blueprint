import { Difficulty } from './difficulty';
import { Skill } from './skill';
import { User } from './user';

export class Blueprint {
  public owner: User;
  public title: string;
  public isOfficial: boolean;
  public thumbnail: string;
  public difficulty: Difficulty;
  public skills: Skill[];
  public likeCount: number;
  public createDate: Date;
  public updateDate: Date;
}
